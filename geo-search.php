<?php
use Guzzle\Http\Client;

require_once "vendor/autoload.php";

$loader = new \Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new \Twig_Environment($loader);

if (isset($_GET['coords'])) {
    $coords = $_GET['coords'];
} else {
    exit;
}
if (isset($_GET['name'])) {
    $name = $_GET['name'];
} else {
    $name = 'заправка okko';
}

$options = [
    'apikey' => 'b21876ad-7feb-47bb-863c-154c02a218e0',
    'text' => $name,
    'lang' => 'ru',
    'll' => $coords,
    'spn' => '1,1',
    'type' => 'biz',
    'results' => 12
];

$url = 'https://search-maps.yandex.ru/v1/?' . http_build_query($options);

$client = new Client();

$response = $client->get($url)->send();

$body = json_decode($response->getBody(), true);

$list = [];

foreach ($body['features'] as $feature) {
    $list[] = [
        'name' => $feature['properties']['CompanyMetaData']['name'],
        'address' => $feature['properties']['CompanyMetaData']['address'],
    ];
}

echo $twig->render('geolist.html.twig', ['data' => $list]);