<?php

namespace Comsolit\EasyGooglemap\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CoordinateResolverElement extends AbstractFormElement
{
    public function render()
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
        
        $result = $this->initializeResultArray();
        
        $result['requireJsModules'][] = $apiEndpoint;
        $result['requireJsModules'][] = '/typo3conf/ext/easy_googlemap/Resources/Public/jquery/addressMap.js';
        $result['requireJsModules'][] = '/typo3conf/ext/easy_googlemap/Resources/Public/jquery/addressMapConfig.js';
        
        $result['html'] = implode('', $out);
        
        return $result;
    }
}
