<?php

namespace Comsolit\EasyGooglemap\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class UrlInputElement extends AbstractFormElement
{
    public function render()
    {
        $out [] = '<div class="form-control-wrap" style="max-width: 650px">';
        $out [] = '<div class="form-control-clearable">';
        $out [] = '<input type="hidden" class="url-input" value="' . $this->data['row']['link'] . '" name="' . $this->data['itemFormElName'] . '">';
        $out [] = '</div>';
        $out [] = '</div>';
        
        $result = $this->initializeResultArray();
        $result['requireJsModules'][] = '/typo3conf/ext/easy_googlemap/Resources/Public/jquery/urlInput.js';
        $result['html'] = implode('', $out);
        
        return $result;
    }
}
