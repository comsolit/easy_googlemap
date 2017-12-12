<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Feeasygooglemap',
	'EasyGoogleMap'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
  $_EXTKEY,
  'Configuration/TypoScript',
  'EasyGoogleMap'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
  'tx_easygooglemap_domain_model_location',
  'EXT:easy_googlemap/Resources/Private/Language/locallang_csh_tx_easygooglemap_domain_model_location.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
  'tx_easygooglemap_domain_model_location'
);
