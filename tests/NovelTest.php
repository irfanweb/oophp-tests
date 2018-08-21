<?php

use App\Lib\Novel;

class NovelTest extends PHPUnit_Framework_TestCase
{

	public function testWeCanCreateNovel()
	{
		$novel = new Novel();
		$novel->setCategory('romance');
		$this->assertEquals('romance', $novel->getCategory());
	}


	public function testWeCanExtendsFromBookClass()
	{			
		$title = 'Games of Thornes';
		$author = 'JRR Martin';

		$novel = new Novel($title, $author);
		$novel->setCategory('Fantasy');
		$this->assertEquals('Fantasy', $novel->getCategory());

	}	



	public function testItCanTellActualNumberOfPages()
	{
		$novel = new Novel();
		$novel->setAllPages(100);
		$this->assertEquals(98, $novel->numberOfPages());
	}



}