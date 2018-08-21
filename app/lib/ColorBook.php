<?php

namespace App\Lib;

class ColorBook extends Book
{
	private $recommendAge = array();
	private $introductionToParents;

	public function __construct($title ='N/A')
	{
		parent::__construct($title, 'Not Required');

	}

	public function setRecommendAge($recommendAge)
	{
		$this->recommendAge = $recommendAge;
	}

	public function getRecommendAge()
	{
		return $this->recommendAge;
	}


	public function numberOfPages()
	{
		return $this->allPages - self::COVER_PAGES - $this->introductionToParents;
	}

	public function getIntroToParents()
	{
		return $this->introductionToParents;
	}	

	public function setIntroToParents($pageNumbers)
	{
		$this->introductionToParents = $pageNumbers;
	}




}