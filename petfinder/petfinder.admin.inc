<?php

/**
 * @file
 * 
 * Admin setting page for Pet Finder module
 * 
 */

function petfinder_settings_form() {
	$form = array();

	$form['petfinder_api_key'] = array(
		'#type' => 'textfield',
		'#title' => t('API Key'),
		'#default_value' => variable_get('petfinder_api_key', 'Enter API Key'),
	);

	$form['petfinder_url'] = array(
		'#type' => 'textfield',
		'#title' => t('Pet Finder URL'),
		'#default_value' => variable_get('petfinder_url', 'Enter a url where you would like the search results to be displayed.'),
	);

	return system_settings_form($form);
}
