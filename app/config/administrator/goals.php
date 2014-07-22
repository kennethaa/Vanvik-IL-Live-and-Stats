<?php

/**
 * event_set(event, fd, events, callback) model config
 */

return array(

	'title' => 'Mål',

	'single' => 'mål',

	'model' => 'Goal',

	'form_width' => 400,

	/**
	 * The display columns
	 */
	'columns' => array(
		'match' => array(
			'title' => 'Kamp',
			'relationship' => 'match',
			'select' => "CONCAT((:table).hometeam_id, ' - ', (:table).awayteam_id)",
		),
		'minute' => array(
			'title' => 'Spilleminutt',
			'sort_field' => 'minute',
		),
		'scorer' => array(
			'title' => 'Målscorer',
			'relationship' => 'scorer',
			'select' => '(:table).name',
		),
		'assist' => array(
			'title' => 'Assist',
			'relationship' => 'assist',
			'select' => '(:table).name',
		),
		'description' => array(
			'title' => 'Beskrivelse',
			'sort_field' => 'description',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'match' => array(
			'title' => 'Kamp',
			'type' => 'relationship',
			'name_field' => 'match_name',
		),
		'scorer' => array(
			'title' => 'Målscorer',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'assist' => array(
			'title' => 'Assist',
			'type' => 'relationship',
			'name_field' => 'name',
		),

	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'match' => array(
			'title' => 'Kamp',
			'type' => 'relationship',
			'name_field' => 'match_name',
			'options_sort_field' => 'id',
			'options_sort_direction' => 'desc',
		),
		'minute' => array(
			'title' => 'Spilleminutt',
			'type' => 'text',
			'limit' => 10
		),
		'scorer' => array(
			'title' => 'Målscorer',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'assist' => array(
			'title' => 'Assist',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'hometeam' => array(
			'title' => 'Hjemmelaget?',
			'type' => 'bool',
		),
		'description' => array(
			'title' => 'Beskrivelse',
			'type' => 'textarea',
			'height' => 150, //optional, defaults to 100
		),

	),

);