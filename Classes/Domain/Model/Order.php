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
class Tx_TlShop_Domain_Model_Order extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * name
	 * @var Tx_Tl_Domain_Model_Article $article
	 */
	protected $article;

	/**
	 * size
	 * @var Tx_TlShop_Domain_Model_Size
	 */
	protected $size;
	
	/**
	 * color
	 * @var Tx_TlShop_Domain_Model_Color
	 */
	protected $color;

	/**
	 * date
	 * @var DateTime
	 */
	protected $shopped;

	/**
	 * @param Tx_TlShop_Domain_Model_Size $size size
	 * @return void
	 */
	public function setSize(Tx_TlShop_Domain_Model_Size $size) {
		$this->size = $size;
	}

	/**
	 * @return Tx_TlShop_Domain_Model_Size size
	 */
	public function getSize() {
		return $this->size;
	}
	
	/**
	 * @param Tx_TlShop_Domain_Model_Color $color color
	 * @return void
	 */
	public function setColor(Tx_TlShop_Domain_Model_Color $color) {
		$this->color = $color;
	}

	/**
	 * @return Tx_TlShop_Domain_Model_Color color
	 */
	public function getColor() {
		return $this->color;
	}

	/**
	 * @param Tx_Tl_Domain_Model_Article $article
	 * @return void
	 */
	public function setArticle(Tx_Tl_Domain_Model_Article $article) {
		$this->article = $article;
	}

	/**
	 * @return Tx_Tl_Domain_Model_Article
	 */
	public function getArticle() {
		return $this->article;
	}

	/**
	 * @param DateTime $date
	 * @return void
	 */
	public function setShopped(DateTime $shopped) {
		$this->shopped = $shopped;
	}

	/**
	 * @return DateTime
	 */
	public function getShopped() {
		return $this->shopped;
	}

}
?>
