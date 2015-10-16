
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
	
#. Create a **system folder**
	Go to Page > Create new pages > Folder. Drag “Folder” to your
	Pagetree. Rename that folder to “Locations” or any other name of your choice.

#. **Set storagePID**
	In that backend view scroll down to the “Default storage PID” and change it to the ID of your Folder you created in the Step 5:
	
	.. image:: ../Images/PID.png


#. Add **one or more** locations
	Go to List > “Your storage folder” > Create new record. Click on “EasyGoogleMap Location” to create an object.
   
#. **Place the map** extension in your content   
	Switch to Page > “Page you want to put the map on” insert the Plugin by clicking on “Add a new record at this place”
	
	.. image:: ../Images/backend.png
	

	After that switch to the “Plugins” tab, click on “General Plugins” and then switch to the “Plugin” tab. 
	In the dropdown-menu choose “EasyGoogleMap” and save the record.
	
	.. image:: ../Images/backend02.png	
	

#. **Displaying only certain locations** on different pages   
	If you don't want EasyGoogleMap to display all of your saved Locations on the same page, 
	you can do it by creating a “location”-record on the page you want it to be shown on by going 
	to List > “Page of your choice” and doing the same thing as you would have done in Step 7.
	
	Once you created all the locations you want for that particular page, 
	you need to set the storagePID for this page only. 
	You can do it by changing to “Template” and clicking on “Click here to create an extension template”
	
	Then change the value of the Default storage PID to the ID of the current page.
