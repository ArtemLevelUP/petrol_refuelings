<?php

/**
 * @Entity @Table(name="refueling")
 **/
class Refueling
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $stationName;

    /** @Column(type="string") **/
    protected $petrolType;

    /** @Column(type="float") **/
    protected $price;

    /** @Column(type="float") **/
    protected $volume;

    /** @Column(type="float") **/
    protected $cost;

    /** @Column(type="datetime") **/
    protected $date;

    /** @Column(type="integer") **/
    protected $run;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getStationName()
    {
        return $this->stationName;
    }

    /**
     * @param mixed $stationName
     */
    public function setStationName($stationName)
    {
        $this->stationName = $stationName;
    }

    /**
     * @return mixed
     */
    public function getPetrolType()
    {
        return $this->petrolType;
    }

    /**
     * @param mixed $petrolType
     */
    public function setPetrolType($petrolType)
    {
        $this->petrolType = $petrolType;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getRun()
    {
        return $this->run;
    }

    /**
     * @param mixed $run
     */
    public function setRun($run)
    {
        $this->run = $run;
    }

    /**
     * @return double
     */
    public function getDiscount()
    {
        return $this->price * $this->volume - $this->cost;
    }

    /**
     * @return double
     */
    public function getDiscountPer()
    {
        return $this->getDiscount() / ($this->price * $this->volume) * 100;
    }
}