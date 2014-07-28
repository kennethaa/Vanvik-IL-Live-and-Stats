<?php

/**
 * Seasons model config
 */

return array(

	'title' => 'Sesonger',

	'single' => 'sesong',

	'model' => 'Season',

	/**
	 * The display columns
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Sesongnavn',
			'sort_field' => 'name',
		),
		'formatted_start_date' => array(
			'title' => 'Startdato',
			'sort_field' => 'start_date',
		),
		'formatted_end_date' => array(
			'title' => 'Sluttdato',
			'sort_field' => 'end_date',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'name' => array(
			'title' => 'Navn',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Navn',
			'type' => 'text',
			'limit' => 100,
		),
		'start_date' => array(
			'title' => 'Startdato',
			'type' => 'date',
		),
		'end_date' => array(
			'title' => 'Sluttdato',
			'type' => 'date',
		),
	),

);