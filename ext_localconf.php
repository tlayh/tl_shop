<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Category' => 'index','Article' => 'index','Order' => 'index, submit'
	),
	array(
		'Category' => 'index','Article' => 'index','Order' => 'index, submit'
	)
);

?>
