<?php

namespace Comsolit\EasyGooglemap\ViewHelpers\PageRenderer;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

class AddJsFooterInlineCodeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     * @inject
     */
    protected $configurationManager;

    /**
     * @var \TYPO3\CMS\Core\Page\PageRenderer
     */
    protected $pageRenderer;

    /**
     *
     * @param \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
     */
    public function injectPageRenderer(PageRenderer $pageRenderer)
    {
        $this->pageRenderer = $pageRenderer;
    }

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument("name", "string", "", false);
        $this->registerArgument("compress", "boolean", "");
        $this->registerArgument("forceOnTop", "boolean", "");
        $this->registerArgument("excludeFromConcatenation", "boolean", "");
    }

    /**
     * @return null
     * @throws \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
     */
    public function render()
    {
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

        $this->pageRenderer->addJsLibrary(
            'googlemap',
            $googleMapApiEndpoint,
            'text/javascript',
            false,
            false,
            '',
            true
        );

        $this->pageRenderer->addCssFile(
            $this->templateVariableContainer->get('settings')['cssfile'] ?:
                'EXT:easy_googlemap/Resources/Public/css/map.css'
        );

        $this->pageRenderer->addJsFooterInlineCode(
            $this->arguments['name'],
            $block,
            $this->arguments['compress'],
            $this->arguments['forceOnTop']
        );

        return null;
    }
}