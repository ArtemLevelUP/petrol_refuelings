<?php
require_once 'bootstrap.php';

$loader = new \Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new \Twig_Environment($loader);

if (isset($_POST['petrol-type'])) {
    $refueling = new Refueling();
    $refueling->setPetrolType($_POST['petrol-type']);
    $refueling->setStationName($_POST['station-name']);
    $refueling->setPrice($_POST['price']);
    $refueling->setVolume($_POST['volume']);
    $refueling->setCost($_POST['cost']);
    $refueling->setRun($_POST['run']);
    $refueling->setDate(\DateTime::createFromFormat('j.m.Y', $_POST['date']));

    $entityManager->persist($refueling);
    $entityManager->flush();
}

$data = [];

$month = ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];

$total = [
    'totalCost' => 0,
    'totalDiscount' => 0,
];

$refuelings = $entityManager->getRepository('Refueling')->findBy([], ['date' => 'DESC']);

/** @var Refueling $refueling */
foreach ($refuelings as $refueling) {
    $key = $refueling->getDate()->format('m.Y');
    if (!array_key_exists($key, $data)) {
        $data[$key] = [
            'refs' => [],
            'totalCost' => 0,
            'totalDiscount' => 0,
        ];
    }
    $data[$key]['refs'][] = $refueling;
    $data[$key]['totalCost'] += $refueling->getCost();
    $data[$key]['totalDiscount'] += $refueling->getDiscount();
    $total['totalCost'] += $refueling->getCost();
    $total['totalDiscount'] += $refueling->getDiscount();
    if (empty($data[$key]['monthName'])) {
        $data[$key]['monthName'] = sprintf('%s %d', $month[$refueling->getDate()->format('m') - 1], $refueling->getDate()->format('Y'));
    }
}

echo $twig->render('index.html.twig', ['rList' => $data, 'total' => $total]);