<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_tlshop_domain_model_order'] = array(
	'ctrl' => $TCA['tx_tlshop_domain_model_order']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'article,shopped,size,color'
	),
	'types' => array(
		'1' => array('showitem' => 'article,shopped,size,color')
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
				'foreign_table' => 'tx_tlshop_domain_model_order',
				'foreign_table_where' => 'AND tx_tlshop_domain_model_order.uid=###REC_FIELD_l18n_parent### AND tx_tlshop_domain_model_order.sys_language_uid IN (-1,0)',
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
		'shopped' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_order.shopped',
			'config'  => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime,required',
				'checkbox' => '0',
				'default' => '0'
			)
		),
		'article' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_order.article',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_tlshop_domain_model_article',
				'MM' => 'tx_tlshop_order_article_mm',
				'minitems' => 0,
				'maxitems' => 99999,
				'size' => 5
			)
		),
		'size' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_order.size',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_tlshop_domain_model_size',
				'MM' => 'tx_tlshop_order_size_mm',
				'maxitems' => 99999,
				'size' => 5,
				'minitems' => 0
			)
		),
		'color' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_order.color',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_tlshop_domain_model_color',
				'MM' => 'tx_tlshop_order_color_mm',
				'maxitems' => 99999,
				'size' => 5,
				'minitems' => 0
			)
		),
	),
);
?>
