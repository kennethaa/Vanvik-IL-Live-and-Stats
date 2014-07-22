<?php

/**
 * event_set(event, fd, events, callback) model config
 */

return array(

	'title' => 'Kort',

	'single' => 'kort',

	'model' => 'Card',

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
		'happening' => array(
			'title' => 'Hendelse',
			'sort_field' => 'happening',
		),
		'player' => array(
			'title' => 'Spiller',
			'relationship' => 'player',
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
		'happening' => array(
			'title' => 'Hendelse',
			'type' => 'enum',
			'options' => array(
		        'yellowcard' => 'Gult kort',
		        'yellowredcard' => '2. gule kort',
		        'redcard' => 'Rødt kort'
		    ),
		),
		'player' => array(
			'title' => 'Spiller',
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
		'happening' => array(
			'title' => 'Hendelse',
			'type' => 'enum',
			'options' => array(
		        'yellowcard' => 'Gult kort',
		        'yellowredcard' => '2. gule kort',
		        'redcard' => 'Rødt kort'
		    ),
		),
		'player' => array(
			'title' => 'Spiller',
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