<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals']['Comsolit\\EasyGooglemap\\Evaluation\\CoordinateEvaluation'] = '';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Comsolit.easy_googlemap',
    'Feeasygooglemap',
    array(
        'Location' => 'list'
    )
);

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1587664120] = [
    'nodeName' => 'coordinateResolver',
    'priority' => 40,
    'class' => \Comsolit\EasyGooglemap\Form\Element\CoordinateResolverElement::class,
];
$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1587664121] = [
    'nodeName' => 'urlInput',
    'priority' => 40,
    'class' => \Comsolit\EasyGooglemap\Form\Element\UrlInputElement::class,
];
