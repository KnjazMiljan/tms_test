<?php

namespace App\Services;

/**
 * API integration for User
 */
class UserApi
{
	protected $apiKey;
	private $credentials = [
		'firstname' => 'Miljan',
		'lastname'	=> 'Knezevic',
		'email'		=> 'example@example.com'
	];

	
	function __construct($apiKey)
	{
		$this->apiKey = $apiKey;
	}

	public function getUser() {
		return $this->credentials;
	}
}