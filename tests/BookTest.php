<?php

use App\Lib\Book;
use App\Lib\Novel;

class BookTest extends PHPUnit_Framework_TestCase
{


/*	public function testWeCanCreateNewBook()
	{
		$book = new Book();
	}

	public function testBookHasATitle()
	{	
		$book = new Book();
		$book->setTitle('Lords of the ring');
		$this->assertEquals('Lords of the ring', $book->getTitle());

	}
*/


	public function createBook()
	{

//		return new Book();
		return new Novel();

	
	}	

	public function testDifferentBookCanHaveDifferentTitles()
	{
		
		$book1 = $this->createBook();
		$title1 = 'Lords of the ring';
		$book1->setTitle($title1);
		$this->assertEquals($title1, $book1->getTitle());


		$book2 = $this->createBook();
		$title2 = 'Alchemist';
		$book2->setTitle($title2);
		$this->assertEquals($title2, $book2->getTitle());

	}



	public function testDifferentBookCanHaveDifferentAuthors()
	{
		
		$book1 = $this->createBook();
		$author1 = 'JRR Matin';
		$book1->setTitle($author1);
		$this->assertEquals($author1, $book1->getTitle());


		$book2 = $this->createBook();
		$author2 = 'Smity';
		$book2->setTitle($author2);
		$this->assertEquals($author2, $book2->getTitle());

	}


	public function testWeCanCreateBookWithTitleAndAuthor()
	{
		
		$title = 'Life of a Pie';
		$author = 'John Doe';

//		$book = new Book($title, $author);	
		$book = new Novel($title, $author);		

		$this->assertEquals($title, $book->getTitle());
		$this->assertEquals($author, $book->getAuthor());


	}	



}