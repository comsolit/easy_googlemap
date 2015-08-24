<?php
if (! defined('TYPO3_MODE')) {
    die('Access denied.');
}

$TCA ['tx_easygooglemap_domain_model_location'] = array (
    'ctrl' => $TCA ['tx_easygooglemap_domain_model_location'] ['ctrl'],
    'interface' => array (
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, city, country, postal_code, street, longitude, latitude, icon, link'
    ),
    'types' => array (
        '1' => array (
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, city, country, postal_code, street, tx_coordinate_resolver, longitude, latitude, icon, link,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'
        )
    ),
    'palettes' => array (
        '1' => array (
            'showitem' => ''
        )
    ),
    'columns' => array (
        'sys_language_uid' => array (
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array (
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array (
                    array (
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        - 1
                    ),
                    array (
                        'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                        0
                    )
                )
            )
        ),
        'l10n_parent' => array (
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array (
                'type' => 'select',
                'items' => array (
                    array (
                        '',
                        0
                    )
                ),
                'foreign_table' => 'tx_easygooglemap_domain_model_location',
                'foreign_table_where' => 'AND tx_easygooglemap_domain_model_location.pid=###CURRENT_PID### AND tx_easygooglemap_domain_model_location.sys_language_uid IN (-1,0)'
            )
        ),
        'l10n_diffsource' => array (
            'config' => array (
                'type' => 'passthrough'
            )
        ),
        't3ver_label' => array (
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array (
                'type' => 'input',
                'size' => 30,
                'max' => 255
            )
        ),
        'hidden' => array (
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array (
                'type' => 'check'
            )
        ),
        'starttime' => array (
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => array (
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array (
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                )
            )
        ),
        'endtime' => array (
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => array (
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array (
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                )
            )
        ),
        'title' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.title',
            'config' => array (
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim, required'
            )
        ),
        'city' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.city',
            'config' => array (
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            )
        ),
        'country' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.country',
            'config' => array (
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            )
        ),
        'postal_code' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.postal_code',
            'config' => array (
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            )
        ),
        'street' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.street',
            'config' => array (
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            )
        ),
        'tx_coordinate_resolver' => array (
            'exclude' => 0,
            'config' => array (
                'type' => 'user',
                'size' => '30',
                'userFunc' => 'TYPO3\\EasyGooglemap\\Userfuncs\\Tca->coordinateResolver',
                'parameters' => array(
                    'city' => 'city',
                    'country' => 'country',
                    'postal_code' => 'postal_code',
                    'street' => 'street'
                )
            )
        ),
        'longitude' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.longitude',
            'config' => array (
                'type' => 'input',
                'size' => 10,
                'eval' => 'required, tx_easygooglemap_coordinate'
            )
        ),
        'latitude' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.latitude',
            'config' => array (
                'type' => 'input',
                'size' => 10,
                'eval' => 'required, tx_easygooglemap_coordinate'
            )
        ),
        'icon' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.icon',
            'config' => array (
                'type' => 'group',
                'internal_type' => 'file',
                'uploadfolder' => 'uploads/tx_easygooglemap',
                'show_thumbs' => 1,
                'size' => 5,
                'allowed' => $GLOBALS ['TYPO3_CONF_VARS'] ['GFX'] ['imagefile_ext'],
                'disallowed' => ''
            )
        ),
        'link' => array (
            'exclude' => 0,
            'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.link',
            'config' => array (
                'type' => 'user',
                'size' => '255',
                'userFunc' => 'TYPO3\\EasyGooglemap\\Userfuncs\\Tca->urlInput',
                'parameters' => array(
                )
            )
        )
    )
);

?>