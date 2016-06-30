<?php

namespace Comsolit\EasyGooglemap\Userfuncs;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class Tca
{
    public function coordinateResolver($PA, $fObj)
    {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\\Extbase\Object\ObjectManager');
        $configurationManager = $objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');
        $setting = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
        $apiKey = $setting['plugin.']['tx_easygooglemap.']['settings.']['apiKey'];
        $apiLanguage = $setting['plugin.']['tx_easygooglemap.']['settings.']['apiLanguage'];

        $out [] = '<div id="map" style="height: 400px;"></div>';
        $out [] = '<script src="//maps.googleapis.com/maps/api/js?key='.$apiKey.'&language='.$apiLanguage.'"></script>';
        $out [] = '<script type="text/javascript"' . ' src="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(easy_googlemap) . 'Resources/Public/jquery/addressMap.js">' . '</script>';
        $out [] = '<script type="text/javascript"' . ' src="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(easy_googlemap) . 'Resources/Public/jquery/addressMapConfig.js">' . '</script>';
        return implode('', $out);

    }


    public function urlInput($PA, $fObj)
    {
        $out [] = '<div class="form-control-wrap" style="max-width: 650px">';
        $out [] = '<div class="form-control-clearable">';
        $out [] = '<input type="hidden" class="url-input" value="' . $PA['row']['link'] . '" name="' . $PA['itemFormElName'] . '">';
        $out [] = '</div>';
        $out [] = '</div>';
        $out [] = '<script type="text/javascript"' . ' src="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(easy_googlemap) . 'Resources/Public/jquery/urlInput.js">' . '</script>';
        return implode('', $out);
    }
}