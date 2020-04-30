
.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.


Installation
============

This walkthrough will help you to implement the extension easy_googlemap at your TYPO3 site.


#. Download the extension

#. Go to **Extension Manager** of your TYPO3-Page and upload the Extension 

#. Activate the Extension

#. Include the Static TypoScript

	.. image:: ../Images/include-typoscript.png

#. Add Your Google Maps API Key
Generate your API Key for Google JavaScript MAP under (https://developers.google.com/maps/documentation/javascript/get-api-key)
and configure this in the TypoScript "apiKey"
	
#. Add **one or more** locations
	Go to List > Create new record where you want to store the locations. Click on “EasyGoogleMap > Location” to create a new record. 

	.. image:: ../Images/Standort-Backend.png		
	
#. **Place the map** extension at your page   
	Switch to Page > “Page you want to put the map on” insert the Plugin by clicking on “Create a new content element”

	After that switch to the “Plugins” tab, click on “General Plugins” and then switch to the “Plugin” tab. 
	In the dropdown-menu choose “EasyGoogleMap” and save the record.
	
	.. image:: ../Images/backend.png	
	
#. **Set record storage page**
	In that Plugin view choose the Page where you have the Locations you will show in at the Page.
	
	.. image:: ../Images/backend02.png
	