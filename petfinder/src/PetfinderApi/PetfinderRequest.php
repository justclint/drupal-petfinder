<?php

namespace Drupal\petfinder\PetfinderApi;

/**
 * @file
 * This is our Petfinder instantiator that returns arrayed data per request type
 * 
 */
class PetfinderRequest {
  
  /**
   * @todo need to figure out if this can be used between types or just randomPet (currently used by randomPet)
   * @param array $args Loads default arguments if none are supplied
   */
  static private function setArguments($args) {
    $argDefaults = array(
      'animal' => '',
      'breed' => '',
      'size' => '',
      'sex' => '',
      'location' => '',
      'shelter' => '',
      'output' => '',
      );
    $args = array_merge($argDefaults, $args);
    return $args;
  }

  /**
   * @param  string @api_key Api key
   * @param  string @petid Pet id
   * @return array Pet data
   */
  static function singlePet($api_key, $pet_id) {
    $petfinder = new Petfinder($api_key);
    $petfinder->setResponseFormat('json');
    $request = $petfinder->pet_get($pet_id);
    $response = json_decode($request, TRUE);
    $results = $response['petfinder']; 
    return $results;
  }
  
  /**
   * @param  string @api_key Api key
   * @param  array Arguments to build request
   * @return array Pet data
   */
  static function randomPet($api_key, $args=NULL) {
    if ($args == NULL) {
      $args = array();
    }
    $arguments = self::setArguments($args);
    if ($arguments['output'] == '') {
      $arguments['output'] = 'basic';
    }
    $petfinder = new Petfinder($api_key);
    $petfinder->setResponseFormat('json');
    $request = $petfinder->pet_getRandom($arguments);
    $response = json_decode($request, TRUE);
    switch ($arguments['output']) {
      case 'id':
        $results = $response['petfinder']['petIds']['id'];
        break;
      case 'basic':
        $results = $response['petfinder'];
        break;
      case 'full':
          $results = $response;
          break;  
      default:
        $results = $response;
        break;
    }
    return $results;
  } 

  /**
   * @todo Currently only accpts location paramater per the pet_find() method in petfinder.
   * Need to allow other parameters.
   * @param  string @api_key Api key
   * @param  string @args Search criteria
   * @return array List of pets
   */
  static function searchPets($api_key, $args) {
    $petfinder = new Petfinder($api_key);
    $petfinder->setResponseFormat('json');
    $request = $petfinder->pet_find($args);
    $response = json_decode($request, TRUE);
    $results = $response['petfinder'];
    return $results;
  }
}


// 100 PFAPI_OK  No error
// 200 PFAPI_ERR_INVALID Invalid request
// 201 PFAPI_ERR_NOENT Record does not exist
// 202 PFAPI_ERR_LIMIT A limit was exceeded
// 203 PFAPI_ERR_LOCATION  Invalid geographical location
// 300 PFAPI_ERR_UNAUTHORIZED  Request is unauthorized
// 301 PFAPI_ERR_AUTHFAIL  Authentication failure
// 999 PFAPI_ERR_INTERNAL  Generic internal error