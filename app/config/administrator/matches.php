<?php

/**
 * Players model config
 */

return array(

	'title' => 'Kamper',

	'single' => 'kamp',

	'model' => 'Match',

	'form_width' => 400,

	/**
	 * The display columns
	 */
	'columns' => array(
		'season' => array(
			'title' => 'Sesong',
			'relationship' => 'season',
			'select' => '(:table).name',
		),
		'hometeam' => array(
			'title' => 'Hjemmelag',
			'relationship' => 'hometeam',
			'select' => '(:table).id',
		),
		'awayteam' => array(
			'title' => 'Bortelag',
			'relationship' => 'awayteam',
			'select' => '(:table).id',
		),
		'start_time' => array(
			'title' => 'Starttid',
			'sort_field' => "start_time",
		),
		'venue' => array(
			'title' => 'Bane',
			'sort_field' => "venue",
		),
		'star3' => array(
			'title' => '3 stjerner',
			'relationship' => 'star3',
			'select' => '(:table).name',
		),
		'star2' => array(
			'title' => '2 stjerner',
			'relationship' => 'star2',
			'select' => '(:table).name',
		),
		'star1' => array(
			'title' => '1 stjerne',
			'relationship' => 'star1',
			'select' => '(:table).name',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'season' => array(
			'title' => 'Sesong',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'hometeam' => array(
			'title' => 'Hjemmelag',
			'type' => 'relationship',
			'name_field' => 'id',
		),
		'awayteam' => array(
			'title' => 'Bortelag',
			'type' => 'relationship',
			'name_field' => 'id',
		),
		'venue' => array(
			'title' => 'Bane',
			'type' => 'text',
		),
		'ref' => array(
			'title' => 'Hoveddommer',
			'type' => 'text',
		),
		'a_ref1' => array(
			'title' => 'AD 1',
			'type' => 'text',
		),
		'a_ref2' => array(
			'title' => 'AD 2',
			'type' => 'text',
		),
		'star3' => array(
			'title' => '3 stjerner',
			'type' => 'relationship',
		),
		'star2' => array(
			'title' => '2 stjerner',
			'type' => 'relationship',
		),
		'star1' => array(
			'title' => '1 stjerne',
			'type' => 'relationship',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'season' => array(
			'title' => 'Sesong',
			'type' => 'relationship',
			'name_field' => 'name',
			'options_sort_field' => 'id',
			'options_sort_direction' => 'desc',
		),
		'hometeam' => array(
			'title' => 'Hjemmelag',
			'type' => 'relationship',
			'name_field' => 'id',
		),
		'awayteam' => array(
			'title' => 'Bortelag',
			'type' => 'relationship',
			'name_field' => 'id',
		),
		'starting' => array(
			'title' => 'Startellever',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'substitute' => array(
			'title' => 'Innbyttere',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'start_time' => array(
			'title' => 'Starttid',
			'type' => 'datetime',
		),
		'venue' => array(
			'title' => 'Bane',
			'type' => 'text',
		),
		'ref' => array(
			'title' => 'Hoveddommer',
			'type' => 'text',
		),
		'a_ref1' => array(
			'title' => 'AD 1',
			'type' => 'text',
		),
		'a_ref2' => array(
			'title' => 'AD 2',
			'type' => 'text',
		),
		'spectators' => array(
			'title' => 'Tilskuere',
			'type' => 'text',
			'limit' => 10
		),
		'star3' => array(
			'title' => '3 stjerner',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'star2' => array(
			'title' => '2 stjerner',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'star1' => array(
			'title' => '1 stjerne',
			'type' => 'relationship',
			'name_field' => 'name',
		),

	),

);