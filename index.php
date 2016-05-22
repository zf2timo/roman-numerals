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

    $length = strlen($number);
    for ($i = 0; $i < $length; $i++) {
        $currentPosition = (int)$number[$i];
        $nextPosition = (int)($number[$i + 1] ?? -1);
        $pos = $length - $i - ($currentPosition < 5 ? 1 : 0);
        $romanNumerical = $map[$pos];
        if ($currentPosition === 4) {
            $romanNumerical = $map[$pos] . $map[$pos + 1];
        } elseif ($currentPosition / 5 < 0.8 && $currentPosition > 1) {
            $romanNumerical = str_repeat($map[$pos], $currentPosition);
        } elseif ($currentPosition === 9) {
            $romanNumerical = $map[$pos - 1] . $map[$pos + 1];
        } elseif ($currentPosition > 5) {
            $romanNumerical = $map[$pos] . str_repeat($map[$pos - 1], $currentPosition - 5);
        } elseif ($nextPosition === 0) {
            $romanNumerical = $map[$pos + 1];
        }

        $result .= $romanNumerical;

        if ($nextPosition === 0) {
            $i++;
        }
    }

    return $result;
}
