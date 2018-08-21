<?php

namespace App\Lib;

 use App\Lib\Book;
 use App\Lib\Novel;
 use App\Lib\PersistanceGatewayInterface;

 use App\Lib\SerializePersister;

class Library
{

	private $books = [];

	private $persistnce;

	public static $persistencePath = 'tmp/library.txt';

	public function __construct(PersistanceGatewayInterface $persistance = null)
	{

		$this->persistance = $persistance ? : new SerializePersister();

	}



	public function add(Book $book)
	{
		 $this->books[] = $book;
	}

	public function findAll()
	{
		return $this->books;
	}

	public function findByTitle($title)
	{

		//  foreach($this->books as $book)
		// {
		//  	return $book->getTitle() == $title;
		// }

		return array_filter($this->books, function($book) use ($title){

			return $book->getTitle() == $title;

		});

	}



	public function removeByTitle($title)
	{

		$this->books = array_values(

			array_filter($this->books, function($book) use ($title){

			return $book->getTitle() != $title;

			})
		);

	}


	public function save()
	{


		$this->persistence->save($this->books);

		//file_put_contents(self::$persistencePath, serialize($this->books));

	}


	public function loadFromFile()
	{

		$this->books = unserialize(file_get_contents(self::$persistencePath));

	}









}
