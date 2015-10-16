
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


Customization
=============


Custom pin
------------

You can upload a custom marker icon.
If you don't have a custom marker icon or you want to keep the default Google marker then just don't upload any icon. 
The default one will appear by itself.

  .. image:: ../../Images/custom-pin.png


Set the anchor
-----------------

You can set two anchor values for your custom marker. 
Negative values on X-anchor moves the marker to the right and positive values moves 
him to the left. On Y-anchor positive values moves the marker up and negative moves him down. 
The preview of the custom marker will be shown after refreshing the page. Your chosen marker point should be
exactly on the anchor point cross. While you are changing the anchor values, your longitude and latitude wont change.

  .. image:: ../../Images/set-anchor.png


Infobox
----------

When infobox is checked, title will appear in a small box on the frontend map.
  
  .. image:: ../../Images/backend-infobox.png
  
  .. image:: ../../Images/frontend-infobox.png
  
  
Set a adress
-------------  

Drag and move the icon to choose your location or just enter your address into the address fields. 
Your marker will move automatically and update the longitude and latitude values.

  .. image:: ../../Images/set-adress.png
  