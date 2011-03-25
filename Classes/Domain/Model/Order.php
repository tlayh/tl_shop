<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Thomas Layh <thomas@layh.com>
*  
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
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
 * Order
 */
class Tx_TlShop_Domain_Model_Order extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * orderDate
	 *
	 * @var DateTime
	 */
	protected $orderDate;

	/**
	 * article
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Tempforshop_Domain_Model_Article>
	 */
	protected $article;

	/**
	 * user
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Tempforshop_Domain_Model_User>
	 */
	protected $user;


	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		* Do not modify this method!
		* It will be rewritten on each save in the kickstarter
		* You may modify the constructor of this class instead
		*/
		$this->article = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->user = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * @param DateTime $orderDate
	 * @return void
	 */
	public function setOrderDate(DateTime $orderDate) {
		$this->orderDate = $orderDate;
	}

	/**
	 * @return DateTime
	 */
	public function getOrderDate() {
		return $this->orderDate;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Tempforshop_Domain_Model_Article> $article
	 * @return void
	 */
	public function setArticle(Tx_Extbase_Persistence_ObjectStorage $article) {
		$this->article = $article;
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Tempforshop_Domain_Model_Article>
	 */
	public function getArticle() {
		return $this->article;
	}

	/**
	 * @param Tx_Tempforshop_Domain_Model_Article the Article to be added
	 * @return void
	 */
	public function addArticle(Tx_Tempforshop_Domain_Model_Article $article) {
		$this->article->attach($article);
	}

	/**
	 * @param Tx_Tempforshop_Domain_Model_Article the Article to be removed
	 * @return void
	 */
	public function removeArticle(Tx_Tempforshop_Domain_Model_Article $articleToRemove) {
		$this->article->detach($articleToRemove);
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Tempforshop_Domain_Model_User> $user
	 * @return void
	 */
	public function setUser(Tx_Extbase_Persistence_ObjectStorage $user) {
		$this->user = $user;
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Tempforshop_Domain_Model_User>
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param Tx_Tempforshop_Domain_Model_User the User to be added
	 * @return void
	 */
	public function addUser(Tx_Tempforshop_Domain_Model_User $user) {
		$this->user->attach($user);
	}

	/**
	 * @param Tx_Tempforshop_Domain_Model_User the User to be removed
	 * @return void
	 */
	public function removeUser(Tx_Tempforshop_Domain_Model_User $userToRemove) {
		$this->user->detach($userToRemove);
	}

}
?>
