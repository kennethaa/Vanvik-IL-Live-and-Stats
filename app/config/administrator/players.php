<?php

/**
 * Players model config
 */

return array(

	'title' => 'Spillere',

	'single' => 'spiller',

	'model' => 'Player',

	/**
	 * The display columns
	 */
	'columns' => array(
		'number' => array(
			'title' => 'Nummer',
			'sort_field' => "number",
		),
		'name' => array(
			'title' => 'Navn',
			'sort_field' => 'name',
		),
		'formatted_birth_date' => array(
			'title' => 'Født',
			'sort_field' => 'birth_date',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'number' => array(
			'title' => 'Nummer',
		),
		'position' => array(
			'title' => 'Posisjon',
			'type' => 'enum',
			'options' => array(
		        'goalkeeper' => 'Keeper',
		        'defender' => 'Forsvar',
		        'midtfielder' => 'Midtbane',
		        'striker' => 'Angrep'
		    ),
		),
		'name' => array(
			'title' => 'Navn',
		),
		'birth_date' => array(
			'title' => 'Født',
			'type' => 'date'
		),
		'inactive' => array(
			'title' => 'Innaktiv',
			'type' => 'bool'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'number' => array(
			'title' => 'Nummer',
			'type' => 'number',
			'limit' => 2,
		),
		'position' => array(
		    'type' => 'enum',
		    'title' => 'Posisjon',
		    'options' => array(
		        'goalkeeper' => 'Keeper',
		        'defender' => 'Forsvar',
		        'midtfielder' => 'Midtbane',
		        'striker' => 'Angrep'
		    ),
		),
		'name' => array(
			'title' => 'Navn',
			'type' => 'text',
			'limit' => 100,
		),
		'birth_date' => array(
			'title' => 'Født',
			'type' => 'date',	
		),
		'teams' => array(
			'title' => 'Tidligere klubber',
			'type' => 'text',
		),
		'image' => array(
		    'title' => 'Bilde',
		    'type' => 'image',
		    'location' => public_path() . '/uploads/players/originals/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 10,
		),
		'inactive' => array(
			'title' => 'Innaktiv',
			'type' => 'bool',
		),
	),

);