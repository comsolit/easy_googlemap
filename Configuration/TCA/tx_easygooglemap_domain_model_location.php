<?php

if (!defined('TYPO3_MODE')) {
  die('Access denied.');
}

$GLOBALS['TCA']['tx_easygooglemap_domain_model_location'] = [
  'ctrl' => [
    'title' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'dividers2tabs' => TRUE,
    'sortby' => 'sorting',
    'versioningWS' => true,
    'origUid' => 't3_origuid',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'delete' => 'deleted',
    'enablecolumns' => [
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
    ],
    'searchFields' => 'title, infobox, city, country, postal_code, street, anchorx, anchory, longitude, latitude, icon, link',
    'iconfile' => \TYPO3\CMS\Core\Utility\GeneralUtility::compat_version('7.5')
      ? 'EXT:easy_googlemap/Resources/Public/Icons/tx_easygooglemap_domain_model_location.png'
      : \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_easygooglemap_domain_model_location.png'
  ],
  'interface' => [
    'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, infobox, street, postal_code, city, country, anchorx, anchory,  longitude, latitude, icon, link'
  ],
  'types' => [
    '0' => [
      'showitem' => '
      --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, title, hidden, infobox, infotext,
      street, postal_code, city, country, tx_coordinate_resolver, anchorx, anchory, longitude, latitude, icon, link, 
      '
    ]
  ],
  'palettes' => [
    '1' => [
      'showitem' => ''
    ]
  ],
  'columns' => [
    'sys_language_uid' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
        'default' => -1,
        'items' => [
          [
            'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
            -1
          ],
          [
            'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
            0
          ]
        ]
      ]
    ],
    'l10n_parent' => [
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          [
            '',
            0
          ]
        ],
        'foreign_table' => 'tx_easygooglemap_domain_model_location',
        'foreign_table_where' => 'AND tx_easygooglemap_domain_model_location.pid=###CURRENT_PID### AND tx_easygooglemap_domain_model_location.sys_language_uid IN (-1,0)'
      ]
    ],
    'l10n_diffsource' => [
      'config' => [
        'type' => 'passthrough'
      ]
    ],
    't3ver_label' => [
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'max' => 255
      ]
    ],
    'hidden' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
      'config' => [
        'type' => 'check'
      ]
    ],
    'starttime' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
      'config' => [
        'behaviour' => [
          'behaviour' => [
            'allowLanguageSynchronization' => true
          ]
        ],
        'renderType' => 'inputDateTime',
        'type' => 'input',
        'size' => 13,
        'eval' => 'datetime',
        'checkbox' => 0,
        'default' => 0,
        'range' => [
          'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
        ]
      ]
    ],
    'endtime' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
      'config' => [
        'behaviour' => [
          'behaviour' => [
            'allowLanguageSynchronization' => true
          ]
        ],
        'renderType' => 'inputDateTime',
        'type' => 'input',
        'size' => 13,
        'eval' => 'datetime',
        'checkbox' => 0,
        'default' => 0,
        'range' => [
          'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
        ]
      ]
    ],

    'infobox' => [
      'exclude' => 1,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.infobox',
      'config' => [
        'type' => 'check'
      ]
    ],

    'title' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.title',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim, required'
      ]
    ],
    'infotext' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.infotext',
      'config' => [
        'type' => 'text',
        'cols' => 30,
        'rows' => 5,
      ]
    ],
    'postal_code' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.postal_code',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ]
    ],
    'city' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.city',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ]
    ],
    'street' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.street',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ]
    ],
    'country' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.country',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim'
      ]
    ],
    'tx_coordinate_resolver' => [
      'exclude' => 0,
      'config' => [
        'type' => 'user',
        'size' => '30',
        'userFunc' => 'Comsolit\\EasyGooglemap\\Userfuncs\\Tca->coordinateResolver',
        'parameters' => [
          'city' => 'city',
          'country' => 'country',
          'postal_code' => 'postal_code',
          'street' => 'street'
        ]
      ]
    ],
    'longitude' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.longitude',
      'config' => [
        'type' => 'input',
        'size' => 10,
        'eval' => 'required,Comsolit\\EasyGooglemap\\Evaluation\\CoordinateEvaluation,trim'
      ]
    ],
    'latitude' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.latitude',
      'config' => [
        'type' => 'input',
        'size' => 10,
        'eval' => 'Comsolit\\EasyGooglemap\\Evaluation\\CoordinateEvaluation,trim,required'
      ]
    ],
    'anchorx' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.anchorx',
      'config' => [
        'type' => 'input',
        'size' => 10,
        'eval' => '',
        'default' => 0
      ]
    ],
    'anchory' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.anchory',
      'config' => [
        'type' => 'input',
        'size' => 10,
        'eval' => '',
        'default' => 0
      ]
    ],
    'icon' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.icon',
      'config' => [
        'type' => 'group',
        'internal_type' => 'file',
        'uploadfolder' => 'uploads/tx_easygooglemap',
        'size' => 5,
        'allowed' => $GLOBALS ['TYPO3_CONF_VARS'] ['GFX'] ['imagefile_ext'],
        'disallowed' => ''
      ]
    ],
    'link' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:easy_googlemap/Resources/Private/Language/locallang_db.xlf:tx_easygooglemap_domain_model_location.link',
      'config' => [
        'type' => 'user',
        'size' => '255',
        'userFunc' => 'Comsolit\\EasyGooglemap\\Userfuncs\\Tca->urlInput',
        'parameters' => []
      ]
    ]
  ]
];
