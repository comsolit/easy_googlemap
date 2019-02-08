<?php

namespace Comsolit\EasyGooglemap\Userfuncs;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException;

class Tca
{

    /**
     * @param $PA
     * @param $fObj
     * @return string
     * @throws InvalidConfigurationTypeException
     */
    public function coordinateResolver($PA, $fObj)
    {
        $objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');

        /** @var ConfigurationManager $configurationManager */
        $configurationManager = $objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');

        $setting = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
        $apiEndpoint = $setting['plugin.']['tx_easygooglemap.']['settings.']['apiEndpoint'];
        $apiKeyBackend = $setting['plugin.']['tx_easygooglemap.']['settings.']['apiKeyBackend'];
        $apiLanguage = $setting['plugin.']['tx_easygooglemap.']['settings.']['apiLanguage'];

        $apiKeyExists = false;

        if (!empty($apiKeyBackend)) {
            $apiKeyExists = true;
            $apiEndpoint .= '?key=' . $apiKeyBackend;
        }

        if (!empty($apiLanguage)) {
            $apiEndpoint .= ($apiKeyExists ? '&language=' : '?language=');
            $apiEndpoint .= $apiLanguage;
        }

        $out [] = '<div id="map" style="height: 400px;"></div>';
        $out [] = '<script src="' . $apiEndpoint . '"></script>';
        $out [] = '<script type="text/javascript"' . ' src="' . $this->getExtPath() . '/Resources/Public/jquery/addressMap.js">' . '</script>';
        $out [] = '<script type="text/javascript"' . ' src="' . $this->getExtPath() . '/Resources/Public/jquery/addressMapConfig.js">' . '</script>';

        return implode('', $out);
    }

    /**
     * @param $PA
     * @param $fObj
     * @return string
     */
    public function urlInput($PA, $fObj)
    {
        $out [] = '<div class="form-control-wrap" style="max-width: 650px">';
        $out [] = '<div class="form-control-clearable">';
        $out [] = '<input type="hidden" class="url-input" value="' . $PA['row']['link'] . '" name="' . $PA['itemFormElName'] . '">';
        $out [] = '</div>';
        $out [] = '</div>';
        $out [] = '<script type="text/javascript"' . ' src="' . $this->getExtPath() . '/Resources/Public/jquery/urlInput.js">' . '</script>';

        return implode('', $out);
    }

    public function getExtPath()
    {

        return PathUtility::getRelativePathTo(ExtensionManagementUtility::extPath('easy_googlemap'));
    }
}