<?php

require_once(t3lib_extMgm::extPath('tl_shop').'/Classes/Controller/ArticleController.php');

class Tx_TlShop_Controller_ArticleController_testcase extends Tx_Extbase_BaseTestCase {

	/**
	 * @var Tx_TlShop_Tests_Mock_Controller_ArticleControllerMock
	 */
	private $articleController;

	/**
	 * @var Tx_Extbase_Dispatcher
	 */
	private $dispatcher;

	public function setUp() {
		$this->dispatcher = new Tx_Extbase_Dispatcher();

		$this->articleController = t3lib_div::makeInstance('Tx_TlShop_Tests_Mock_Controller_ArticleControllerMock');
		$this->articleController->injectMockView(new Tx_Fluid_View_TemplateView());

	}

	// test article controller indexAction
	public function testIndexAction() {
		$article = t3lib_div::makeInstance('Tx_TlShop_Domain_Model_Article');
		$this->articleController->indexAction($article);
	}

}

class Tx_TlShop_Tests_Mock_Controller_ArticleControllerMock extends Tx_TlShop_Controller_ArticleController {

	public function injectMockView(Tx_Extbase_MVC_View_ViewInterface $view) {
		$this->view = $view;
	}

}
