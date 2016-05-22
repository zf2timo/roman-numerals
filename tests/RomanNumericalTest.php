<?php


class RomanNumericalTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param $number
     * @param $expected
     * @dataProvider numberDataProvider
     */
    public function testRomanNumericals($number, $expected)
    {
        $this->assertSame($expected, convertToRomanNumber($number));
    }

    public function numberDataProvider()
    {
        return [
            ['1', 'I'],
            ['2', 'II'],
            ['3', 'III'],
            ['4', 'IV'],
            ['5', 'V'],
            ['6', 'VI'],
            ['7', 'VII'],
            ['8', 'VIII'],
            ['9', 'IX'],
            ['10', 'X'],
            ['11', 'XI'],
            ['12', 'XII'],
            ['13', 'XIII'],
            ['14', 'XIV'],
            ['15', 'XV'],
            ['16', 'XVI'],
        ];
    }
}
