
.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Configuration
=============

This chapter gives you a basic configuration about the TYPO3 CMS extension **easy_googlemap**.

.. only:: html

   .. contents::
        :local:
        :depth: 1


Plugin settings
---------------

This section covers all settings, which can be defined in the plugin itself. 


Persistence
^^^^^^^^^^^

.. _tsstoragePid:

storagePid
""""""""""

.. container:: table-row

   Property
         storagePid
   Data type
         string
   Description
         PageId of page containing Location objects.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.persistence {
         storagePid = 4
         }`	


Files and paths
^^^^^^^^^^^^^^^^

.. _tstemplateRootPath:

templateRootPath
""""""""""""""""""""

.. container:: table-row

   Property
         templateRootPath
   Data type
         string
   Description
         Path to template root directory.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.view {
              templateRootPath = fileadmin/templates/
            }`	


.. _tspartialRootPath:

partialRootPath
""""""""""""""""

.. container:: table-row

   Property
         partialRootPath
   Data type
         string
   Description
         Path to template root directory.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.view {
              templateRootPath = fileadmin/templates/
            }`	


.. _tslayoutRootPath:

layoutRootPath
"""""""""""""""

.. container:: table-row

   Property
         layoutRootPath
   Data type
         string
   Description
         Path to template layouts.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.view {
              layoutRootPath = fileadmin/layouts/
            }`	


.. _tscssfile:

cssfile
""""""""

.. container:: table-row

   Property
         cssfile
   Data type
         string
   Description
         Path to custom css file.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              cssfile = fileadmin/css/map.css
            }`	


.. _tsincludeJquery:

includeJquery
""""""""""""""""""""

.. container:: includeJquery

   Property
         table-row
   Data type
         boolean
   Description
         Enable or disable jQuery.
		 **Example:**
		 :code:`plugin.tx_easygooglemap {
              includeJquery = 1
            }`	


.. _tsjquery:

jquery
"""""""

.. container:: jquery

   Property
         table-row
   Data type
         string
   Description
         Set jQuery source.
		 **Example:**
		 :code:`plugin.tx_easygooglemap {
              jquery = jquery-2.1.1.min.js
            }`	


Map setup
^^^^^^^^^^^

.. _tsapiEndpoint:

apiEndpoint
""""""""""""""""""""

.. container:: setup

   Property
         table-row
   Data type
         string
   Description
         Google Maps API Endpoint.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
                      apiEndpoint = //maps.googleapis.com/maps/api/js
                    }`

.. _tsapiKey:

apiKey
""""""""""""""""""""

.. container:: setup

   Property
         table-row
   Data type
         string
   Description
         Google Maps API Key.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
                  apiKey = xxxxxxxxxxxxxxxxxxxx
                }`

.. _tsapiLanguage:

apiLanguage
""""""""""""""""""""

.. container:: setup

   Property
         table-row
   Data type
         string
   Description
         Language of Google Maps.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
                      apiLanguage = de-ch
                    }`


.. _tscenterMapLatitude:

centerMapLatitude
""""""""""""""""""""

.. container:: centerMapLatitude

   Property
         table-row
   Data type
         string
   Description
         Sets the initial latitude.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              centerMapLatitude = 47.6554401
            }`	


.. _tscenterMapLongitude:

centerMapLongitude
""""""""""""""""""""

.. container:: centerMapLongitude

   Property
         table-row
   Data type
         string
   Description
         Sets the initial longitude.
		 **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              centerMapLongitude = 8.1758800
            }`	


.. _tsfadeoutcats:

fadeoutcats
""""""""""""""""""""

.. container:: fadeoutcats

   Property
         table-row
   Data type
         string
   Description
         A comma-separated list of categories to hide. For example: road, water
         etc. All options are available here: https://developers.google.com/maps/documentation/javascript/reference#MapTypeStyleFeatureType.
         **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              fadeoutcats = transit, poi.business
            }`	


.. _tszoom:

zoom
"""""

.. container:: zoom

   Property
         table-row
   Data type
         Int+
   Description
         Initial map zoom level.
         **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              zoom = 9
            }`	


Map styling
^^^^^^^^^^^^^


.. _tsgamma:

gamma
""""""

.. container:: zoom

   Property
         table-row
   Data type
         string
   Description
         Modifies the gamma by raising the lightness to the given power. Valid values: [0.01, 10], with 1.0 representing no change.
         **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              gamma = 0.67
         }`	


.. _tssaturation:

saturation
""""""""""

.. container:: saturation

   Property
         table-row
   Data type
         int
         
         [-100 - 100]
   Description
         Shifts the saturation of colors by a percentage of the original value
         if decreasing and a percentage of the remaining value if increasing.
         **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              saturation = 50
            }`	


Dimensions and offset
^^^^^^^^^^^^^^^^^^^^^


.. _tsheight:

height
"""""""

.. container:: height

   Property
         table-row
   Data type
         string
   Description
         The height of the map.
         **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              height = 400px
            }`	


.. _tswidth:

width
""""""

.. container:: width

   Property
         table-row
   Data type
         string
   Description
         The width of the map.
         **Example:**
		 :code:`plugin.tx_easygooglemap.configuration {
              width = 900px
            }`

