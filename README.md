# drupal-petfinder
Drupal 7 module for Petfinder.com API

# Utilizes 
Brian Havari's Petfinder Class https://github.com/brianhaveri/Petfinder

GeoNames City lookup http://genames.org

# Required Modules
1. Jquery Update https://www.drupal.org/project/jquery_update
2. X Autoload https://www.drupal.org/project/xautoload

# Instructions
1. Get your API key from http://www.petfinder.com/developers/api-key
2. Set jquery update to pull from jquery cdn
3. After install this module go to admin/config/petfinder/settings to add your API key and search results url
	- Currently the URL field only supports a single parameter. 
	- ie: 'somename' will work. 'some/name' will not. This will get resolved in future release.
4. Flush cache
5. In Blocks you will find 'Petfinder - Search' and 'Petfinder - Random'. Place those where you'd like.

You can search using the the seach block and click on a pet image to view its profile. 
* Profile file only currently showing image, pet name and contact phone. More to come.
