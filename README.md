# drupal-petfinder
Drupal module for Petfinder.com API

# Utilizes 
Brian Havari's Petfinder Class https://github.com/brianhaveri/Petfinder

GeoNames City lookup http://genames.org

# Instructions
1. Get your API key from http://www.petfinder.com/developers/api-key
2. Set jquery update to pull from jquery cdn
3. After install this module go to config/petfinder/settings to add your API key and search results url
* Currently only supporst single parameter. ie: 'somename' will work. 'some/name' will not. This will get resolved in future release.
4. Flush cache
5. In Blocks you will find 'Petfinder - Search' and 'Petfinder - Random'. Place those where you'd like.

You can search using the the seach block and click on a pet image to view its profile. 
* Profile file only currently showing image, pet name and contact phone. More to come.
