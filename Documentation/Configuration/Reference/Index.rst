

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


Reference
^^^^^^^^^

plugin.tx\_easygooglemapproperties: TS configuration.


Persistence
"""""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:
   
   Data type
         Data type:
   
   Description
         Description:
   
   Default
         Default:


.. container:: table-row

   Property
         storagePid
   
   Data type
         string
   
   Description
         PageId of page containing Location objects.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.persistence {
              storagePid = 4
            }
   
   Default


.. ###### END~OF~TABLE ######


Files and paths
"""""""""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:
   
   Data type
         Data type:
   
   Description
         Description:
   
   Default
         Default:


.. container:: table-row

   Property
         templateRootPath
   
   Data type
         string
   
   Description
         Path to template root directory.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.view {
              templateRootPath = fileadmin/templates/
            }
   
   Default


.. container:: table-row

   Property
         partialRootPath
   
   Data type
         string
   
   Description
         Path to partials root directory.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.view {
              partialRootPath = fileadmin/partials/
            }
   
   Default


.. container:: table-row

   Property
         layoutRootPath
   
   Data type
         string
   
   Description
         Path to template layouts.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.view {
              layoutRootPath = fileadmin/layouts/
            }
   
   Default


.. container:: table-row

   Property
         cssfile
   
   Data type
         string
   
   Description
         Path to custom css file.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              cssfile = fileadmin/css/map.css
            }
   
   Default


.. container:: table-row

   Property
         includeJquery
   
   Data type
         boolean
   
   Description
         Enable or disable jQuery.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap {
              includeJquery = 1
            }
   
   Default


.. container:: table-row

   Property
         jquery
   
   Data type
         string
   
   Description
         Set jQuery source.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap {
              jquery = jquery-2.1.1.min.js
            }
   
   Default


.. ###### END~OF~TABLE ######


Map setup
"""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:
   
   Data type
         Data type:
   
   Description
         Description:
   
   Default
         Default:


.. container:: table-row

   Property
         centerMapLatitude
   
   Data type
         string
   
   Description
         Sets the initial latitude.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              centerMapLatitude = 47.6554401
            }
   
   Default


.. container:: table-row

   Property
         centerMapLongitude
   
   Data type
         string
   
   Description
         Sets the initial longitude.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              centerMapLongitude = 8.1758800
            }
   
   Default


.. container:: table-row

   Property
         fadeoutcats
   
   Data type
         string
   
   Description
         A comma-separated list of categories to hide. For example: road, water
         etc. All options are available here: https://developers.google.com/map
         s/documentation/javascript/reference#MapTypeStyleFeatureType.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              fadeoutcats = transit, poi.business
            }
   
   Default


.. container:: table-row

   Property
         zoom
   
   Data type
         Int+
         
         [0 - 18]
   
   Description
         Initial map zoom level.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              zoom = 9
            }
   
   Default
         8


.. ###### END~OF~TABLE ######


Map styling
"""""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:
   
   Data type
         Data type:
   
   Description
         Description:
   
   Default
         Default:


.. container:: table-row

   Property
         gamma
   
   Data type
         string
   
   Description
         Modifies the gamma by raising the lightness to the given power. Valid
         values: [0.01, 10], with 1.0 representing no change.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              gamma = 0.67
         
         **}**
   
   Default
         0.79


.. container:: table-row

   Property
         saturation
   
   Data type
         int
         
         [-100 - 100]
   
   Description
         Shifts the saturation of colors by a percentage of the original value
         if decreasing and a percentage of the remaining value if increasing.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              saturation = 50
            }
   
   Default
         -98


.. ###### END~OF~TABLE ######


Dimensions and offset
"""""""""""""""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   roperty
         roperty:
   
   Data type
         Data type:
   
   Description
         Description:
   
   Default
         Default:


.. container:: table-row

   roperty
         height
   
   Data type
         string
   
   Description
         The height of the map.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              height = 400px
            }
   
   Default
         350px


.. container:: table-row

   roperty
         width
   
   Data type
         string
   
   Description
         The width of the map.
         
         **Example:**
         
         ::
         
            plugin.tx_easygooglemap.configuration {
              width = 900px
            }
   
   Default
         auto


.. ###### END~OF~TABLE ######

