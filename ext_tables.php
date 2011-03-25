<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Three-now Shop'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Three-now Shop');

//$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');


t3lib_extMgm::addLLrefForTCAdescr('tx_tlshop_domain_model_category', 'EXT:tl_shop/Resources/Private/Language/locallang_csh_tx_tlshop_domain_model_category.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_tlshop_domain_model_category');
$TCA['tx_tlshop_domain_model_category'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_category',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tlshop_domain_model_category.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_tlshop_domain_model_article', 'EXT:tl_shop/Resources/Private/Language/locallang_csh_tx_tlshop_domain_model_article.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_tlshop_domain_model_article');
$TCA['tx_tlshop_domain_model_article'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Article.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tlshop_domain_model_article.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_tlshop_domain_model_order', 'EXT:tlshop/Resources/Private/Language/locallang_csh_tx_tlshop_domain_model_order.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_tlshop_domain_model_order');
$TCA['tx_tlshop_domain_model_order'] = array(
	'ctrl' => array(
		'title'				=> 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_order',
		'label' 			=> 'order_date',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'dividers2tabs' => true,
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l10n_parent',
		'transOrigDiffSourceField' 	=> 'l10n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Order.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tlshop_domain_model_order.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_tlshop_domain_model_size', 'EXT:tl_shop/Resources/Private/Language/locallang_csh_tx_tlshop_domain_model_size.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_tlshop_domain_model_size');
$TCA['tx_tlshop_domain_model_size'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_size',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Size.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tlshop_domain_model_size.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_tlshop_domain_model_color', 'EXT:tl_shop/Resources/Private/Language/locallang_csh_tx_tlshop_domain_model_color.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_tlshop_domain_model_color');
$TCA['tx_tlshop_domain_model_color'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_color',
		'label' 			=> 'name',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Color.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_tlshop_domain_model_color.gif'
	)
);

?>
