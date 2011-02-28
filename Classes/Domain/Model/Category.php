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
 * Category
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_TlShop_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * name
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;
	
	/**
	 * isroot
	 * @var boolean
	 */
	protected $isroot;
	
	/**
	 * parent
	 * @var Tx_TlShop_Domain_Model_Category
	 */
	protected $parent;
	
	
	
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
	 * Setter for isroot
	 *
	 * @param boolean $isroot isroot
	 * @return void
	 */
	public function setIsroot($isroot) {
		$this->isroot = $isroot;
	}

	/**
	 * Getter for isroot
	 *
	 * @return boolean isroot
	 */
	public function getIsroot() {
		return $this->isroot;
	}
	
	/**
	 * Returns the boolean state of isroot
	 *
	 * @return boolean The state of isroot
	 */
	public function isIsroot() {
		return $this->getIsroot();
	}
	
	/**
	 * Setter for parent
	 *
	 * @param Tx_TlShop_Domain_Model_Category $parent parent
	 * @return void
	 */
	public function setParent(Tx_TlShop_Domain_Model_Category $parent) {
		$this->parent = $parent;
	}

	/**
	 * Getter for parent
	 *
	 * @return Tx_TlShop_Domain_Model_Category parent
	 */
	public function getParent() {
		return $this->parent;
	}
	
}
?>