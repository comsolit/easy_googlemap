<?php

namespace TYPO3\EasyGooglemap\ViewHelpers\PageRenderer;

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
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);

        $block = $this->renderChildren();
        $pageRenderer->addJsFooterInlineCode($name, $block, $compress, $forceOnTop);
        return null;
    }
}