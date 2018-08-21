<?php

namespace App\Lib;

interface PersistanceGatewayInterface 
{


	public function save(array $books);

	public function loadFromFile($filePath);


}