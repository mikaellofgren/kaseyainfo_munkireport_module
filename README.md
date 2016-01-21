Kaseya module
================

Reports Kaseya info

Retrieves information from /Library/Preferences/kaseyad.ini

The following information is stored in the table:
Username

Installation:

Place kaseyainfo module in Munkireport-app-modules
add kaseyainfo  to munkireport-config.php
//$conf['modules'] = array(); $conf['modules'] = array('kaseyainfo')

Check that module is loaded: http://your.munkireport.site/index.php?/module/kaseyainfo 

Place kaseyainfo -kaseyainfo.php in Munkireport-app-views-listing-



Edit: Munkireport-assets/locales/en.json and add this line in the list "listings": { "kaseyainfo": "Kaseya",
