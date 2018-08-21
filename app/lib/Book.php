<?php

namespace App\Lib;

abstract class Book
{

	private $title;
	private $author;
	protected $allPages;
	const COVER_PAGES = 2;


	public function __construct($title ='N/A', $author='N/A')
	{
		$this->title = $title;
		$this->author = $author;
	}
	public function __destruct()
	{
		echo'+';
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setAuthor($author)
	{
		$this->author = $author;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getAllPages()
	{
		return $this->allPages;
	}

	public function setAllPages($allPages)
	{
		 $this->allPages = $allPages;
	}

	abstract public function numberOfPages();


}