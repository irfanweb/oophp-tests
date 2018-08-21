<?php

use App\Lib\ColorBook;

class ColorBookTest extends PHPUnit_Framework_TestCase
{


	public function testColorBookExtendingFromBookClass()
	{
			
		$title = 'Rainbow Book';
		$color = new ColorBook($title);
		$range = range(2, 4);
		$color->setRecommendAge($range);

		$this->assertEquals($range, $color->getRecommendAge());
		$this->assertEquals($title, $color->getTitle());
		$this->assertEquals('Not Required', $color->getAuthor());


	}



	public function testItCanTellActualNumberOfPages()
	{
		
		$color = new ColorBook();
		$color->setAllPages(100);
		$color->setIntroToParents(10);
		$this->assertEquals(88, $color->numberOfPages());

	}

}