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
 * Controller for the Category object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_TlShop_Controller_CategoryController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_TlShop_Domain_Repository_CategoryRepository
	 */
	protected $categoryRepository;

	/**
	 * @var Tx_TlShop_Domain_Repository_ArticleRepository
	 */
	protected $articleRepository;

	protected $defaultCategory = 8;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->categoryRepository = t3lib_div::makeInstance('Tx_TlShop_Domain_Repository_CategoryRepository');
		$this->articleRepository = t3lib_div::makeInstance('Tx_TlShop_Domain_Repository_ArticleRepository');
	}

	/**
	 * @param null|Tx_TlShop_Domain_Model_Category $category
	 * @return void
	 */
	public function indexAction(Tx_TlShop_Domain_Model_Category $category = null) {
		// get categories by root or parent category
		//$categories = $this->categoryRepository->findCategoryByParent($category);

		$category = $this->categoryRepository->findByUid($this->defaultCategory);

		// check if articles for the current category exist
		if($category != null) {
			$articles = $this->hasArticles($category);
			if(count($articles) > 0) {
				$this->view->assign('articlesExist', true);
				$this->view->assign('articles', $articles);
			}
		}

		// set current category
		$this->view->assign('currentCat', $category);

		$this->view->assign('categories', $categories);
	}

	/**
	 * @param Tx_TlShop_Domain_Model_Category $category
	 * @return array $articles
	 */
	public function hasArticles(Tx_TlShop_Domain_Model_Category $category) {
		$articles = $this->articleRepository->findByCategory($category);
	    return $articles;
	}

	/*
	 * display the category listing in the box
	 */
	public function catnavAction() {
		
	}
}
?>
