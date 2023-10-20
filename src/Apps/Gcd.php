<?php

namespace BrainGames\Apps\Gcd;

use function BrainGames\Engine\sayHello;
use function BrainGames\Engine\askTheQuestion;
use function BrainGames\Engine\compareAnswers;

function findGcd(int $firstRandNum, int $secondRandNum): int
{
    askTheQuestion("$firstRandNum $secondRandNum");

    $gcdCounter = $firstRandNum;
    while ($firstRandNum % $gcdCounter !== 0 || $secondRandNum % $gcdCounter !== 0) {
        $gcdCounter -= 1;
    }
    return $gcdCounter;
}

function getGcd(int $minVal, int $maxVal): void
{
    $range = [$minVal, $maxVal];
    $userName = sayHello('Find the greatest common divisor of given numbers.');
    $gameTag = 'gcd';

    compareAnswers($range, $gameTag, $userName);
}
