<?php

declare(strict_types = 1);

$number = $argv[1] ?? '0';

echo convertToRomanNumber($number);
echo PHP_EOL . 'Done';
function convertToRomanNumber(string $number) : string
{
    $result = '';

    $map = [
        0 => 'I',
        1 => 'V',
        2 => 'X',
        3 => 'L',
        4 => 'C',
        5 => 'D',
        6 => 'M',
    ];

    $charPos = 0;
    $length = strlen($number) - 1;
    for ($pos = $length; $pos >= 0; $pos--) {

        $currentNumber = (int)$number[$pos];

        if ($currentNumber < 4 && $currentNumber > 0) {
            $romanianNumber = str_repeat($map[$charPos], $currentNumber);
        } elseif ($currentNumber === 4) {
            $romanianNumber = $map[$charPos + 1] . $map[$charPos];
        } elseif ($currentNumber === 5) {
            $romanianNumber = $map[$charPos + 1];
        } elseif ($currentNumber > 5 && $currentNumber < 9) {
            $romanianNumber = str_repeat($map[$charPos], $currentNumber - 5) . $map[$charPos + 1];
        } elseif ($currentNumber === 9) {
            $romanianNumber = $map[$charPos + 2] . $map[$charPos];
        } else {
            $romanianNumber = '';
        }

        $result .= $romanianNumber;
        $charPos += 2;
    }

    return strrev($result);
}
