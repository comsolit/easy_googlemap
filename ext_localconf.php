<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['Comsolit\\EasyGooglemap\\Evaluation\\CoordinateEvaluation'] = '';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Comsolit.' . $_EXTKEY,
	'Feeasygooglemap',
	array(
		'Location' => 'list'
	)
);

?>
