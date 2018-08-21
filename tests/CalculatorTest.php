<?php

use App\Lib\Calculator;

class CalculatorTest extends PHPUnit_Framework_TestCase
{


public function inputNumbersProvider()
{
	return [

		[2, 2, 4],
		[2.5, 2.5, 5],
		[-3, 1, -2],
		[-9, -9, -18]
	];
}

/**
 * @dataProvider inputNumbersProvider
*/
public function testAddNumbers($x, $y, $sum)
{
	
	$calc = new Calculator;

	$this->assertEquals($sum, $calc->add($x, $y));


/*
	// Data Provider can be alternative to array till foreach loop
	$values = [

		[2, 2, 4],
		[2.5, 2.5, 5],
		[-3, 1, -2],
		[-9, -9, -18]
	];

	foreach($values as $item)
	{
		$this->assertEquals($item[2], $calc->add($item[0], $item[1]));
	}
*/
	// $this->assertEquals(4, $calc->add(2, 2));
	// $this->assertEquals(5, $calc->add(2.5, 2.5));
	// $this->assertEquals(-2, $calc->add(-3, 1));	
 

}


/**

 * @expectedException InvalidArgumentException
*/
public function test_Throws_Exception_If_Non_Numeric_Is_Passed()
{
	

	$calc = new Calculator;

 //	$expected = $this->expectException(InvalidArgumentException); // we can use @expectedException annotation or expectException() method also
// 	$this->assertEquals($expected, $calc->add('a', []));	
	
	$calc->add('a', []);



}





}
