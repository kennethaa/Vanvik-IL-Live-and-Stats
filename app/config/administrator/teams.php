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
		'id' => array(
			'title' => 'Navn',
			'sort_field' => 'id',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id' => array(
			'title' => 'Navn',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id' => array(
			'title' => 'Navn',
			'type' => 'text',
			'limit' => 100,
		),
	),

);