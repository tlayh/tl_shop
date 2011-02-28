<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Thomas Layh <thomas@layh.com>
*  			
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Article
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_TlShop_Domain_Model_Article extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * name
	 * @var string
	 */
	protected $name;
	
	/**
	 * image
	 * @var string
	 */
	protected $image;

	/**
	 * sku
	 * @var string
	 */
	protected $sku;
	
	/**
	 * category
	 * @var Tx_TlShop_Domain_Model_Category
	 */
	protected $category;
	
	/**
	 * size
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_TlShop_Domain_Model_Size>
	 */
	protected $size;
	
	/**
	 * color
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_TlShop_Domain_Model_Color>
	 */
	protected $color;

	/**
	 * price
	 * @var string
	 */
	protected $price;

	/**
	 * text
	 * @var string
	 */
	protected $text;
	
	/**
	 * Setter for name
	 *
	 * @param string $name name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Getter for name
	 *
	 * @return string name
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Setter for image
	 *
	 * @param string $image image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Getter for image
	 *
	 * @return string image
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 * Setter for category
	 *
	 * @param Tx_TlShop_Domain_Model_Category $category category
	 * @return void
	 */
	public function setCategory(Tx_TlShop_Domain_Model_Category $category) {
		$this->category = $category;
	}

	/**
	 * Getter for category
	 *
	 * @return Tx_TlShop_Domain_Model_Category category
	 */
	public function getCategory() {
		return $this->category;
	}
	
	/**
	 * Setter for size
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_TlShop_Domain_Model_Size> $size size
	 * @return void
	 */
	public function setSize(Tx_Extbase_Persistence_ObjectStorage $size) {
		$this->size = $size;
	}

	/**
	 * Getter for size
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_TlShop_Domain_Model_Size> size
	 */
	public function getSize() {
		return $this->size;
	}
	
	/**
	 * Adds a Size
	 *
	 * @param Tx_TlShop_Domain_Model_Size The Size to be added
	 * @return void
	 */
	public function addSize(Tx_TlShop_Domain_Model_Size $size) {
		$this->size->attach($size);
	}
	
	/**
	 * Removes a Size
	 *
	 * @param Tx_TlShop_Domain_Model_Size The Size to be removed
	 * @return void
	 */
	public function removeSize(Tx_TlShop_Domain_Model_Size $size) {
		$this->size->detach($size);
	}
	
	/**
	 * Setter for color
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_TlShop_Domain_Model_Color> $color color
	 * @return void
	 */
	public function setColor(Tx_Extbase_Persistence_ObjectStorage $color) {
		$this->color = $color;
	}

	/**
	 * Getter for color
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_TlShop_Domain_Model_Color> color
	 */
	public function getColor() {
		return $this->color;
	}
	
	/**
	 * Adds a Color
	 *
	 * @param Tx_TlShop_Domain_Model_Color The Color to be added
	 * @return void
	 */
	public function addColor(Tx_TlShop_Domain_Model_Color $color) {
		$this->color->attach($color);
	}
	
	/**
	 * Removes a Color
	 *
	 * @param Tx_TlShop_Domain_Model_Color The Color to be removed
	 * @return void
	 */
	public function removeColor(Tx_TlShop_Domain_Model_Color $color) {
		$this->color->detach($color);
	}

	/**
	 * @param string $sku
	 * @return void
	 */
	public function setSku(string $sku) {
		$this->sku = $sku;
	}

	/**
	 * @return string
	 */
	public function getSku() {
		return $this->sku;
	}

	/**
	 * @param string $price
	 * @return void
	 */
	public function setPrice(string $price) {
		$this->price = $price;
	}

	/**
	 * @return string
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param string $text
	 * @return void
	 */
	public function setText(string $text) {
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

}
?>
