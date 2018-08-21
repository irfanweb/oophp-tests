<?php

namespace App\Lib;

use App\Lib\Book;


class Novel extends Book
{
	
	private $category;
	private $paperWeight = 5;

	public function setCategory($category)
	{
		$this->category = $category;

	}

	public function getCategory()
	{
		return $this->category;
	}


	public function getWeight()
	{
		return $this->numberOfPages() * $this->paperWeight;
	}


	public function numberOfPages()
	{
		return $this->allPages - self::COVER_PAGES;
;
	}

}