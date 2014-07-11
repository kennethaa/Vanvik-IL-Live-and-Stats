<?php

/**
 * Team model config
 */

return array(

	'title' => 'Lag',

	'single' => 'lag',

	'model' => 'Team',

	/**
	 * The display columns
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Navn',
			'sort_field' => "name",
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
			'limit' => 50,
		),
	),

);