<?php

/**
 * event_set(event, fd, events, callback) model config
 */

return array(

	'title' => 'Hendelse',

	'single' => 'hendelse',

	'model' => 'Happening',

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
		'event' => array(
			'title' => 'Hendelse',
			'sort_field' => 'event',
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
		        'chance' => 'Sjanse',
		        'comment' => 'Kommentar',
		        'whistle' => 'Fløyte',
		        'change' => 'Bytte'
		    ),
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
		        'chance' => 'Sjanse',
		        'comment' => 'Kommentar',
		        'whistle' => 'Fløyte',
		        'change' => 'Bytte'
		    ),
		),
		'description' => array(
			'title' => 'Beskrivelse',
			'type' => 'textarea',
			'height' => 150, //optional, defaults to 100
		),

	),

);