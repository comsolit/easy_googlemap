<?php

namespace TYPO3\EasyGooglemap\ViewHelpers\PageRenderer;

use TYPO3\CMS\Core\Page\PageRenderer;

class AddJsFooterInlineCodeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     *
     * @param string $name
     * @return NULL
     */
    public function render($name)
    {
        $pageRenderer = $this->getPageRenderer();

        $block = $this->renderChildren();

        $pageRenderer->addJsLibrary(
            'googlemap',
            'http://maps.google.com/maps/api/js?v=3&sensor=false',
            'text/javascript',
            false,
            false,
            '',
            true
        );

        $pageRenderer->addJsLibrary(
            'infobox',
            'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js',
            'text/javascript',
            false,
            false,
            '',
            true
        );

        $pageRenderer->addCssFile(
            $this->templateVariableContainer->get('settings')['cssfile'] ?:
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath(easy_googlemap) . 'Resources/Public/css/map.css'
        );

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