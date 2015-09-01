<?php

namespace TYPO3\EasyGooglemap\Userfuncs;

class Tca
{
    public function coordinateResolver($PA, $fObj)
    {
        $out [] = '<div id="map" style="height: 400px;"></div>';
        $out [] = '<script src="//maps.google.com/maps/api/js?v=3&sensor=false&language=de-ch"></script>';
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