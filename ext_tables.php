<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Feeasygooglemap',
	'EasyGoogleMap'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'EasyGoogleMap');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_easygooglemap_domain_model_location', 'EXT:easy_googlemap/Resources/Private/Language/locallang_csh_tx_easygooglemap_domain_model_location.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_easygooglemap_domain_model_location');
$TCA['tx_easygooglemap_domain_model_location'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title, infobox, city, country, postal_code, street, anchorx, anchory, longitude, latitude, icon, link',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Location.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.5')
			? 'EXT:easy_googlemap/Resources/Public/Icons/tx_easygooglemap_domain_model_location.png'
			: \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_easygooglemap_domain_model_location.png'
	),
);

?>