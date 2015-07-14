<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$TYPO3_CONF_VARS['SC_OPTIONS']['tce']['formevals']['tx_easygooglemap_coordinate'] = 'EXT:easy_googlemap/Configuration/TCA/class.tx_easygooglemap_coordinate.php';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Feeasygooglemap',
	array(
		'Location' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Location' => 'create, update, delete',
		
	)
);

?>