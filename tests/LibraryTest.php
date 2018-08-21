<?php

use App\Lib\Novel;
use App\Lib\Library;
use Mockery as m;
use App\Lib\PersistanceGatewayInterface;
use App\Lib\SerializePersister;

class LibraryTest extends PHPUnit_Framework_TestCase
{

	private $library;

	private $persistence;

	public function setUp()
	{
		
		 $this->persistence = m::mock('PersistanceGatewayInterface');

		$this->library = new Library($this->persistence);

	}

	public function tearDown()
	{
		unset($this->library);

		m::close();
	}	


	public function testLibraryCanHoldABook()
	{
		$novel = new Novel();
		$this->library->add($novel);
		$this->assertEquals(array($novel), $this->library->findAll());
	}


	public function testLibraryCanHoldMultipleBooks()
	{
		
		$novel1 = new Novel();
		$novel2 = new Novel();

		$this->library->add($novel1);
		$this->library->add($novel2);

		$this->assertEquals(array($novel1, $novel2), $this->library->findAll());

	}

	private function Mocked_Novel_With_Title($title)
	{
		
		$novel = $this->getMock('Novel');
		$novel->expects($this->once())
			  ->method('getTitle')
			  ->will($this->returnValue($title));

		return $novel;
	}


	public function testItCanFindABookByTitle()
	{

		$title = 'Interstelar';
		$title1 = 'Life of a Pie';

		$novel = $this->Mocked_Novel_With_Title($title);
		$novel1 = $this->Mocked_Novel_With_Title($title1);		

		$this->library->add($novel);
		$this->library->add($novel1);

		$this->assertEquals(array($novel), $this->library->findByTitle($title));

	}


	public function testItCanRemoveBooksByTitle()
	{

		$title = 'Interstelar';
		$title1 = 'Life of a Pie';

		$novel = $this->Mocked_Novel_With_Title($title);
		$novel1 = $this->Mocked_Novel_With_Title($title1);		

		$this->library->add($novel);
		$this->library->add($novel1);

		$this->library->removeByTitle($title);

		$this->assertEquals(array($novel1), $this->library->findAll());


	}


	// public function testItCanSaveItSelf()
	// {
		// $novel = new Novel('Some Title here');
		// $this->library->add($novel);
		// $this->library->save();

	// 	$this->assertEquals($this->library->findAll(), unserialize(file_get_contents(Library::$persistencePath)));
	// }


	// public function testItCanLoadBooksFromFile()
	// {
	// 	$novel = new Novel('Some Title here');
	// 	$this->library->add($novel);
	// 	$this->library->save();

	// 	$otherlibrary = new Library();

	// 	$otherlibrary->loadFromFile();

	// 	$this->assertEquals($this->library->findAll(), $otherlibrary->findAll());
	// }



	public function testItCanSaveItSelfWithPersistanceGateway()
	{
		

		$novel = new Novel('Some Title here');

		$this->library->add($novel);
	
		$this->persistence->shouldReceive('save')->once()->with($this->library->findAll());
	
		$this->library->save();



	}








}
