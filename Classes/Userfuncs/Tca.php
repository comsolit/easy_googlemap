<?php

namespace TYPO3\EasyGooglemap\Userfuncs;
use TYPO3\CMS\Backend\Utility\BackendUtility;

class Tca
{
    public function coordinateResolver($PA, $fObj)
    {
        $out[] = '<script>';
        $out[] = 'var mapConfig = {';
        $query = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
            " constants ",
            " sys_template "
        );
        $query = str_replace('\n', '', $query['0']['constants']);
        $availableConfigs = ['height', 'width', 'cssfile', 'centerMapLatitude', 'centerMapLongitude', 'zoom', 'saturation', 'gamma', 'fadeoutcats'];
        $tsConfigs = explode("plugin.tx_easygooglemap.configuration.", $query);
        foreach($tsConfigs as $tsConfig){
            foreach($availableConfigs as $availableConfig){
                $pos = strpos($tsConfig, $availableConfig);
                if($pos !== false){

                    $tsConfig = str_replace(' ', '', $tsConfig);
                    $tsConfig = strtr($tsConfig, array ('=' => ':"'));
                    $tsConfig = str_replace(array("\r", "\n"), '', $tsConfig);
                    $jsValue = substr_replace($tsConfig, '"', strlen($tsConfig), 0);

                    $out [] = $jsValue;
                    $out[] = ',';
                }
            }

        }

        $out[] = '};';
        $out[] = '</script>';

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