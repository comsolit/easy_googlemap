<?php

namespace TYPO3\EasyGooglemap\ViewHelpers\PageRenderer;

use TYPO3\CMS\Core\Page\PageRenderer;

class AddJsFooterInlineCodeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     *
     * @param string $name
     * @param string $compress
     * @param string $forceOnTop
     * @return NULL
     */
    public function render($name, $compress = FALSE, $forceOnTop = FALSE)
    {
        $pageRenderer = $this->getPageRenderer();

        $block = $this->renderChildren();
        $pageRenderer->addJsLibrary('googlemap','http://maps.google.com/maps/api/js?v=3&sensor=false');
        $pageRenderer->addJsLibrary('infobox', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js');
        $pageRenderer->addCssFile(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(easy_googlemap) . 'Resources/Public/css/map.css');
        $pageRenderer->addJsFooterInlineCode($name, $block, $compress, $forceOnTop);
        return null;
    }

    /**
     * @return PageRenderer
     */
    private function getPageRenderer()
    {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
    }
}