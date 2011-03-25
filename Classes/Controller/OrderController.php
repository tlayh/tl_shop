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

	protected $formFields = array('firstname', 'lastname', 'street', 'zip', 'email', 'city');

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
		$articleUid = $this->request->getArgument('uid');
		$color = $this->request->getArgument('color');
		$size = $this->request->getArgument('size');
		$price = $this->request->getArgument('price');

		$article = $this->articleRepository->findByUid($articleUid);

		// set fields in case of error
		foreach ($this->formFields as $field) {
			if ($this->request->hasArgument($field)) {
				$this->view->assign($field, $this->request->getArgument($field));
			}
		}

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

		// get customer data and validate, if validation fails, customer is redirected to order form
		$variables['data'] = $this->validateData();

		// assign article data to array variables
		$variables['article'] = $article;
		$variables['price'] = $price;
		$variables['color'] = $color;
		$variables['size'] = $size;

		$result = $this->sendTemplateEmail('order', $variables);
	}

	private function validateData() {
		$error = false;

		$data['agb'] = $this->request->getArgument('agb');
		$data['firstname'] = $this->request->getArgument('firstname');
		$data['lastname'] = $this->request->getArgument('lastname');
		$data['street'] = $this->request->getArgument('street');
		$data['zip'] = $this->request->getArgument('zip');
		$data['city'] = $this->request->getArgument('city');
		$data['email'] = $this->request->getArgument('email');

		if (!$data['agb'] || $data['agb'] != 'agb') {
			$error = true;
			$this->flashMessageContainer->add('Bitte die AGB akzeptieren.');
		}

		if (!$data['firstname'] || strlen($data['firstname']) < 3) {
			$error = true;
			$this->flashMessageContainer->add('Vorname muss mindestens 3 Zeichen haben.');
		}

		if (!$data['lastname'] || strlen($data['lastname']) < 3) {
			$error = true;
			$this->flashMessageContainer->add('Nachname muss mindestens 3 Zeichen haben.');
		}

		if (!$data['street'] || strlen($data['street']) < 3) {
			$error = true;
			$this->flashMessageContainer->add('Strasse muss mindestens 3 Zeichen haben.');
		}

		if (!$data['zip'] || strlen($data['zip']) < 5 || !is_numeric($data['zip'])) {
			$error = true;
			$this->flashMessageContainer->add('Eine Postleitzahl hat immer 5 Zahlen.');
		}

		if (!$data['city'] || strlen($data['city']) < 3) {
			$error = true;
			$this->flashMessageContainer->add('Eine Stadt mit weniger als 3 Buchstaben kenne ich nicht.');
		}

		if (!preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9-_.]+\.[a-zA-Z]{2,4}$/", $data['email'])) {
			$error = true;
			$this->flashMessageContainer->add('Die Email ist ein komisches Format.');
		}

		if ($error != false) {
			$arguments = $data;
			$arguments['uid'] = $this->request->getArgument('uid');
			$arguments['price'] = $this->request->getArgument('price');
			$arguments['size'] = $this->request->getArgument('size');
			$arguments['color'] = $this->request->getArgument('color');
			$this->redirect('index', 'Order', 'tlshop', $arguments);
		} else {
			return $data;
		}

	}

	/**
	 * @param string $templateName
	 * @param array $variables
	 * @return boolean TRUE on success, otherwise false
	 */
	protected function sendTemplateEmail($templateName, array $variables = array()) {
		/** @var $emailView Tx_Fluid_View_StandaloneView */
		$emailView = $this->objectManager->create('Tx_Fluid_View_StandaloneView');
		$emailView->setFormat('html');
		$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$templateRootPath = t3lib_div::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
		$templatePathAndFilename = $templateRootPath . 'Mail/' . $templateName . '.html';
		$emailView->setTemplatePathAndFilename($templatePathAndFilename);

		$emailView->assignMultiple($variables);
		$emailBody = $emailView->render();

		// get settings for mail action
		$senderName = $this->settings['order']['senderName'];
		$senderMail = $this->settings['order']['senderMail'];
		if (isset($this->settings['order']['recipient1'])) {
			$recipient[] = $this->settings['order']['recipient1'];
		}
		if (isset($this->settings['order']['recipient2'])) {
			$recipient[] = $this->settings['order']['recipient2'];
		}

		/** @var $mail t3lib_mail_Message */
		$mail = t3lib_div::makeInstance('t3lib_mail_Message');
		//$mail->addFrom(array($senderMail=>$senderName));
		$mail->setFrom(array($senderMail => $senderName));

		// add recipients
		if ($recipient && is_array($recipient)) {
			foreach ($recipient as $rec) {
				$mail->addBcc($rec);
			}
		}

		$mail->setTo(array($variables['data']['email'] => $variables['data']['firstname'] . ' ' . $variables['data']['lastname']));
		$mail->setSubject('Auftragsbestätigung three-now.com');
		$mail->setBody($emailBody, 'text/html');
		return $mail->send();
	}
}

?>
