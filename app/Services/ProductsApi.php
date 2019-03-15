<?php

namespace App\Services;

/**
 * API integration for Products
 */
class ProductsApi
{
	protected $apiKey;
	private $specifications = [
		[
			'name' => 'Product 1',
			'price'	=> 10.50,
			'picture'		=> 'product1.png'
		],
		[
			'name' => 'Product 2',
			'price'	=> 8.00,
			'picture'		=> 'product2.png'
		],
		[
			'name' => 'Product 3',
			'price'	=> 9.50,
			'picture'		=> 'product3.png'
		],
		[
			'name' => 'Product 4',
			'price'	=> 13.99,
			'picture'		=> 'product4.png'
		],
		[
			'name' => 'Product 5',
			'price'	=> 18.49,
			'picture'		=> 'product5.png'
		],
		[
			'name' => 'Product 6',
			'price'	=> 5.99,
			'picture'		=> 'product6.png'
		],
	];

	function __construct($apiKey)
	{
		$this->apiKey = $apiKey;
	}

	public function getProducts() {
		return $this->specifications;
	}
}