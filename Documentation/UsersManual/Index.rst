.. include:: Images.txt

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


Users manual
------------

**1. Download and install the extension via “Extension Manager”**

|img-7|

**2. Activate the extension**

|img-8|  **3. Include the static TypoScript**

|img-9|

**4. Create a system folder**

Go to Page > Create new pages > Folder. Drag “Folder” to your
Pagetree. Rename that folder to “Locations” or any other name of your
choice.

**5. Set storagePID**

In that backend view scroll down to the “Default storage PID” and
change it to the ID of your Folder you created in the Step 4:

Go to Template > “Your Root-Page” > Constant Editor. Choose
“PLUGIN.TX\_EASYGOOGLEMAP” in the “Category” - drop-down. Now your
should see the backend view where you can customize the map extension.

|img-10|

**6. Add one or more Locations**

Go to List > “Your storage folder” > Create new record. Click on
“EasyGoogleMap Location” to create an object.

**7. Place the Map Extension in your content**

Switch to Page > “Page you want to put the map on” insert the Plugin
by clicking on “Add a new record at this place”

|img-11| After that switch to the “Plugins” tab, click on “General
Plugins” and then switch to the “Plugin” tab. In the dropdown-menu
choose “EasyGoogleMap” and save the record.

**8. Displaying only certain locations on different pages**

If you don't want EasyGoogleMap to display all of your saved Locations
on the same page, you can do it by creating a “location”-record on the
page you want it to be shown on by going to List > “Page of your
choice” and doing the same thing as you would have done in Step 6.
Once you created all the Locations you want for that particular page,
you need to set the storagePID for this page only. You can do it by
changing to “Template” and clicking on “Click here to create an
extension template”

|img-12| Then change the value of the Default storage PID to the ID of
the current page.


.. toctree::
   :maxdepth: 5
   :titlesonly:
   :glob:

   Faq/Index

