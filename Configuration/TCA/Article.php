<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_tlshop_domain_model_article'] = array(
	'ctrl' => $TCA['tx_tlshop_domain_model_article']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name,text,sku,price,image,category,size,color'
	),
	'types' => array(
		'1' => array('showitem' => 'name,text,sku,price,image,category,size,color')
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
				'foreign_table' => 'tx_tlshop_domain_model_article',
				'foreign_table_where' => 'AND tx_tlshop_domain_model_article.uid=###REC_FIELD_l18n_parent### AND tx_tlshop_domain_model_article.sys_language_uid IN (-1,0)',
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
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.name',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'text' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.text',
			'config' => Array (
                'type' => 'text',
                'cols' => '48',
                'rows' => '5',
                'softref' => 'typolink_tag,images,email[subst],url',
                'wizards' => Array(
                    '_PADDING' => 4,
                    'RTE' => Array(
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'type' => 'script',
                        'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
                        'icon' => 'wizard_rte2.gif',
                        'script' => 'wizard_rte.php',
                    ),
                )
            )
		),
		'sku' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.sku',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'price' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.price',
			'config'  => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'image' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.image',
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpg,jpeg',
				'max_size' => '800',
				'uploadfolder' => 'uploads/tx_tlshop',
				'show_thumbs' => '1',
				'size' => '5',
				'maxitems' => '1',
				'minitems' => '0'
			)
		),
		'category' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.category',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_tlshop_domain_model_category',
				'MM' => 'tx_tlshop_article_category_mm',
				'minitems' => 0,
				'maxitems' => 99999,
				'size' => 5
			)
		),
		'size' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.size',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_tlshop_domain_model_size',
				'MM' => 'tx_tlshop_article_size_mm',
				'maxitems' => 99999,
				'size' => 5,
				'minitems' => 0
			)
		),
		'color' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:tl_shop/Resources/Private/Language/locallang_db.xml:tx_tlshop_domain_model_article.color',
			'config'  => array(
				'type' => 'select',
				'foreign_table' => 'tx_tlshop_domain_model_color',
				'MM' => 'tx_tlshop_article_color_mm',
				'maxitems' => 99999,
				'size' => 5,
				'minitems' => 0
			)
		),
	),
);
?>
