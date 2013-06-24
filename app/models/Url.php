<?php

class Url extends Eloquent {

	protected $table = 'urls';

	protected $guarded = array('id');

	public $timestamps = false;

	public static $rules = array(
		'url' => 'required|url'
	);

	// Function to generate the shortened unique URL

	public static function get_unique_short_url() {

		$shortened = base_convert(rand(10000, 99999), 10, 36);

		if(static::whereshortened($shortened)->first()) {
			static::get_unique_short_url();
		}

		return $shortened;

	}

}