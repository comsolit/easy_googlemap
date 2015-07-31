<?php

namespace TYPO3\EasyGooglemap\Userfuncs;

class Tca
{
    public function coordinateResolver($PA, $fObj)
    {
        $out [] = '<div id="map" style="height: 400px;"></div>';
        $out [] = '<script src="http://maps.google.com/maps/api/js?v=3&sensor=false"></script>';
        $out [] = '<script type="text/javascript"' . ' src="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(easy_googlemap) . 'Resources/Public/jquery/addressMap.js">' . '</script>';
        $out [] = '<script type="text/javascript"' . ' src="' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath(easy_googlemap) . 'Resources/Public/jquery/addressMapConfig.js">' . '</script>';
        return implode('', $out);
    }
}