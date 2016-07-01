<?php

namespace Comsolit\EasyGooglemap\ViewHelpers\PageRenderer;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class AddJsFooterInlineCodeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
    * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
    * @inject
    */
    protected $configurationManager;

    /**
     *
     * @param string $name
     * @return NULL
     */
    public function render($name)
    {
        $pageRenderer = $this->getPageRenderer();

        $block = $this->renderChildren();

        $setting = $this
            ->configurationManager
            ->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);

        $googleMapApiEndpoint = $setting['apiEndpoint'];
        $apiKeyExists = false;

        if (array_key_exists('apiKey', $setting) && !empty($setting['apiKey'])) {
            $apiKeyExists = true;
            $googleMapApiEndpoint .= '?key=' . $setting['apiKey'];
        }

        if (array_key_exists('apiLanguage', $setting) && !empty($setting['apiLanguage'])) {
            $googleMapApiEndpoint .= ($apiKeyExists ? '&language=' : '?language=');
            $googleMapApiEndpoint .= $setting['apiLanguage'];
        }

        $pageRenderer->addJsLibrary(
            'googlemap',
            $googleMapApiEndpoint,
            'text/javascript',
            false,
            false,
            '',
            true
        );

        $pageRenderer->addCssFile(
            $this->templateVariableContainer->get('settings')['cssfile'] ?:
            ExtensionManagementUtility::siteRelPath('easy_googlemap') . 'Resources/Public/css/map.css'
        );

        $pageRenderer->addJsFooterInlineCode($name, $block, $compress, $forceOnTop);

        return null;
    }

    /**
     * @return PageRenderer
     */
    private function getPageRenderer()
    {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Core\Page\PageRenderer');
    }
}