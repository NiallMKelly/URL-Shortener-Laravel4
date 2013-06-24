<?php

class HomeController extends BaseController {

	public function index()
	{
		// Return the form view.
		return View::make('index');
	}

	public function post()
	{

		// Get the users input.
		$url = e(Input::get('url'));

		// Ensure that the input is infact a URL
		$validation = Validator::make(array('url' => $url), Url::$rules);

		// If the input is not a URL, redirect to the index with error messages.
		if( $validation->fails() ) {
			return Redirect::to('/')->witherrors($validation->errors());
		}

		// Check if the shortened URL already exists, if it does print out the previously created
		// URL rather than creating new.
		$shorten = Url::whereurl($url)->first();

		if( $shorten ) {
			return View::make('shortened')->with(array('shortened' => $shorten->shortened));
		}

		// If new URL to shorten create a unique shortened URL
		$shortened = Url::get_unique_short_url();

		// Enter the new data into the Urls table
		$row =  Url::create(array(
			'url' => $url,
			'shortened' => $shortened
		));

		// Check if the update to the table succeeded or failed.
		if( $row ) {
			return View::make('shortened')->with('shortened', $row->shortened);
		} else {
			return View::make('index')->with('error', 'An error occured! Please try again.');
		}

	}

	public function shortened($id)
	{
		// Find shortened URL and Redirect
		$id = Url::whereshortened($id)->first();

		if( $id ) {
			return Redirect::to($id->url);
		}

		// If no URL is found redirect to index
		return Redirect::to('/');

	}

}