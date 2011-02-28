<?php
/***************************************************************
*  Copyright notice
*
*  (c)  TODO - INSERT COPYRIGHT
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
 * Repository for Tx_TlShop_Domain_Model_Category
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_TlShop_Domain_Repository_CategoryRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * Find categories by parent category
	 *
	 * @param null|Tx_TlShop_Domain_Model_Category $category
	 * @return void
	 */
	public function findCategoryByParent(Tx_TlShop_Domain_Model_Category $category = null) {
		$query = $this->createQuery();
		if($category == null) {
            return $query->matching($query->greaterThan('isroot', 0))->execute();
		} else {
		    return $query->matching($query->contains('parent', $category))->execute();
		}
	}

}
?>