<?php

class ShopProduct {
	protected $title;
	protected $producerMainName;
	protected $producerFirstName;
	protected $price;
	protected $discount = 0;

	public function __construct( $title, $firstName, $mainName, $price ) {
		$this->title             = $title;
		$this->producerFirstName = $firstName;
		$this->producerMainName  = $mainName;
		$this->price             = $price;
	}

	public function getProducer() {
		return $this->producerFirstName . " " . $this->producerMainName;
	}

	public function getSummaryLine() {
		$base = $this->title . " (" . $this->producerMainName . ", ";
		$base .= $this->producerFirstName . ")";

		return $base;
	}

	public function setDiscount( $num ) {
		$this->discount = $num;
	}

	public function getPrice() {
		return ( $this->price - $this->discount );
	}
}

class ShopProductWriter {
	public function write( ShopProduct $shopProduct ) {
		$str = $shopProduct->title . ": " . $shopProduct->getProducer() . " (" . $shopProduct->getPrice() . ")";

		return $str;
	}
}

class CdProduct extends ShopProduct {
	protected $playLength;

	public function __construct( $title, $firstName, $mainName, $price, $playLength ) {
		parent::__construct( $title, $firstName, $mainName, $price );
		$this->playLength = $playLength;
	}

	public function getPlayLength() {
		return $this->playLength;
	}

	public function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= ": playing time - " . $this->playLength;

		return $base;
	}
}

class BookProduct extends ShopProduct {
	protected $numPages;

	public function __construct( $title, $firstName, $mainName, $price, $numPages ) {
		parent::__construct( $title, $firstName, $mainName, $price );
		$this->numPages = $numPages;
	}

	public function getNumberOfPages() {
		return $this->numPages;
	}

	public function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= ": page count - " . $this->numPages;

		return $base;
	}
}

$product1 = new ShopProduct( 'My Antonia', 'Willa', 'Cather', 5.99 );
$product2 = new CdProduct( "Room For Squares", "John", "Mayer", 9.99, 54 );
$product3 = new BookProduct( "The DaVinci Code", "Dan", "Brown", 49.99, 1034 );

echo $product1->getSummaryLine() . "<br>";
echo $product2->getSummaryLine() . "<br>";
echo $product3->getSummaryLine() . "<br>";
