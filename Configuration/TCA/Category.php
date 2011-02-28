<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_tlshop_domain_model_category'] = array(
	'ctrl' => $TCA['tx_tlshop_domain_model_category']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name,isroot,parent'
	),
	'types' => array(
		'1' => array('showitem' => 'name,isroot,parent')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_tlshop_domain_model_category',
				'foreign_table_where' => 'AND tx_tlshop_domain_model_category.uid=###REC_FIELD_l18n_parent### AND tx_tlshop_domain_model_category.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => array(
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => array(
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_category.name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			)
		),
		'isroot' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_category.isroot',
			'config'  => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'parent' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_category.parent',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_tlshop_domain_model_category',
				'MM' => 'tx_tlshop_category_category_mm',
				'minitems' => 0,
				'maxitems' => 1,
				'maxitems' => 99999,
				'size' => 5
			)
		),
	),
);
?>