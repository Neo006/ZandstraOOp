<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ShopProduct
{
	public $title;
	public $producerFirstName;
	public $producerMainName;
	public $price;
	protected $discount = 0;
	
	public function __construct($title, $firstName, $mainName, $price)
    {
		$this->title             = $title;
		$this->producerFirstName = $firstName;
		$this->producerMainName  = $mainName;
		$this->price             = $price;
	}
	
	public function getProducer()
    {
		return $this->producerFirstName . " " . $this->producerMainName;
	}

	public function getSummaryLine()
    {
        $base  = $this->title . " ( " . $this->producerMainName . " ";
        $base .= $this->producerFirstName . " )";
        return $base;
    }

    public function setDiscount($num)
    {
        $this->discount = $num;
    }

    public function getPrice()
    {
        return ($this->price - $this->discount);
    }
}

class CDProduct extends ShopProduct
{
    public $playLength;

    public function __construct($title, $firstName, $mainName, $price, $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    public function getPlayLength()
    {
        return  $this->playLength;
    }

    public function getSummaryLine()
    {
        $base  = parent::getSummaryLine();
        $base .= " : playing time - " . $this->playLength;
        return $base;
    }
}

class BookProduct extends ShopProduct
{
    public $numPages;

    public function __construct($title, $firstName, $mainName, $price, $numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    public function getNumberOfPages()
    {
        return  $this->numPages;
    }

    public function getSummaryLine()
    {
        $base  = parent::getSummaryLine();
        $base .= " : page - " . $this->numPages;
        return $base;
    }
}

$cdProduct = new CDProduct("Rush", "Bill", "Clinton", 5.99, 10.30);
echo $cdProduct->getSummaryLine();
