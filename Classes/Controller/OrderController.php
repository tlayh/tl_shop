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
 * Controller for the Article object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_TlShop_Controller_OrderController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_TlShop_Domain_Repository_ArticleRepository
	 */
	protected $articleRepository;

	/**
	 * @var Tx_TlShop_Domain_Repository_OrderRepository
	 */
	protected $orderRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->orderRepository = t3lib_div::makeInstance('Tx_TlShop_Domain_Repository_OrderRepository');
		$this->articleRepository = t3lib_div::makeInstance('Tx_TlShop_Domain_Repository_ArticleRepository');
	}

	/**
	 * index action - shows the formular
	 *
	 * @return string The rendered list action
	 */
	public function indexAction() {
		$sku = $this->request->getArgument('sku');
		$articleUid = $this->request->getArgument('uid');
		$color = $this->request->getArgument('color');
		$size = $this->request->getArgument('size');
		$price = $this->request->getArgument('price');

		$article = $this->articleRepository->findByUid($articleUid);

		$this->view->assign('size', $size);
		$this->view->assign('article', $article);
		$this->view->assign('color', $color);
		$this->view->assign('price', $price);
	}

	/**
	 * submit the contact form with all required informations
	 *
	 * @return void
	 */
	public function submitAction() {

		// get product data
		$color = $this->request->getArgument('color');
		$size = $this->request->getArgument('size');
		$articleUid = $this->request->getArgument('uid');
		$price = $this->request->getArgument('price');
		$article = $this->articleRepository->findByUid($articleUid);

		// get customer data and validate
		$data = $this->validateData();

		// get settings for mail action
		$senderName = $this->settings['order']['senderName'];
		$senderMail = $this->settings['order']['senderMail'];
		if(isset($this->settings['order']['recipient1'])) {
			$recipient[] = $this->settings['order']['recipient1'];
		}
		if(isset($this->settings['order']['recipient2'])) {
			$recipient[] = $this->settings['order']['recipient2'];
		}

		t3lib_utility_Debug::debug($senderName, "senderName");
		t3lib_utility_Debug::debug($senderMail, "senderMail");
		t3lib_utility_Debug::debug($recipient, "array of recipient");

		// @todo build email, use fluid for rendering mail message ???
		$body = "This is my first order";

		// @todo send mail: check: http://buzz.typo3.org/article/your-first-blog/
		/** @var $mail t3lib_mail_Message */
		$mail = t3lib_div::makeInstance('t3lib_mail_Message');
		$mail->addFrom(array($senderMail=>$senderName))
				->addTo(array($recipient))
				->setSubject('Order confirmation three-now.com')
				->setBody($body)
				->send();
		

		die('submitting action');
	}

	private function validateData() {
		$data['firstname'] = $this->request->getArgument('firstname');
		$data['lastname'] = $this->request->getArgument('lastname');
		$data['street'] = $this->request->getArgument('street');
		$data['zip'] = $this->request->getArgument('zip');
		$data['city'] = $this->request->getArgument('city');

		

	}
}
?>
