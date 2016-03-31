<?php

namespace Drupal\petfinder\PetfinderApi;


/**
 * @todo this might possibly serve a class for any pet request (random, single, etc...)
 * 
 * @file This class turns our returned pet array into an object
 */
class Pet extends Petfinder {

  function __construct($pet) {
    $this->pet = $pet;
  }

  private function cleanArray($array) {
    $results = array();
    // clean arrays, ie: array(array(1), array(2)) to array(1,2)
    foreach ($array as $key => $value) {
      foreach ($value as $items => $item) {
        $results[] = $item;
      }
    }
    return $results;
  }

  /**
   * @return string Single value of array
   */
  public function setValue($array) {
    $results = '';
    foreach ($array as $value) {
        $results = $value;
    }
    return $results;
  }

  /**
   * @return array List of pet options
   */
  function getAll() {
    $results = $this->pet;
    return $results;
  }

  /**
   * The following methods are for single pet returned arrays
   * These are followed by methods for multi pet retured arrays (pet search results)
   */

  /**
   * @return array List of pet options
   */
  function getOptions() {
    $data = $this->pet['options'];
    if (empty($data)) {
      $results = 'empty';
    }  
    else {
      $key = key($data['option']);
      if (is_numeric($key)) {
        $query = $data['option'];
        $results = $this->cleanArray($query);
      } 
      elseif ($key == '$t') {
        $results = $this->cleanArray($data);
      }     
    }
    return $results;
  }

  /**
   * @return string Status of pet
   */
  function getStatus() {
    $data = $this->pet['pet']['status'];
    $results = $this->setValue($data);
    return $results;
  }

  /**
   * @return array All available contact info
   */
  function getContact() {
    $data = $this->pet['pet']['contact'];
    $results = array();
    foreach ($data as $key => $value) {
      if (!$value) {
          $value['$t'] = '';
      }
      $results[$key] = $value['$t'];
    }
    return $results;
  }

  /**
   * @return string Single Pet ID
   */
  function getId() {
    $data = $this->pet['pet']['id'];
    $results = $this->setValue($data);
    return $results;
  }  

  /**
   * @return string Pet name
   */
  function getName() {
    $data = $this->pet['pet']['name'];
    $results = $this->setValue($data);
    return $results;
  }

  /**
   * @return array Image urls
   */
  function getImages() {
    $data = $this->pet['pet']['media']['photos'];
    $results = $this->cleanArray($data);
    return $results;
  }        

  /**
   * The following methods are for search result pets.
   * Looping through $array['pets']['pet']
   */
 
 /**
   * @return string Status of pet
   */
  function getSearchPetStatus() {
    $data = $this->pet['status'];
    $results = $this->setValue($data);
    return $results;
  }

  /**
   * @return array All available contact info
   */
  function getSearchPetContact() {
    $data = $this->pet['contact'];
    $results = array();
    foreach ($data as $key => $value) {
      if (!$value) {
          $value['$t'] = '';
      }
      $results[$key] = $value['$t'];
    }
    return $results;
  } 
  
  /**
   * @return string Pet ID 
   */
  function getSearchPetId() {
    $data = $this->pet['id'];
    $results = $this->setValue($data);
    return $results;
  }  

  /**
   * @return string Pet name
   */
  function getSearchPetName() {
    $data = $this->pet['name'];
    $results = $this->setValue($data);
    return $results;
  }

  /**
   * @return array Image urls
   */
  function getSearchPetImages() {
    $data = $this->pet['media']['photos'];
    $results = $this->cleanArray($data);
    return $results;
  }  

}
