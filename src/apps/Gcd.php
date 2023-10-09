<?php

namespace Brain\Games\Apps\Gcd;

use function Brain\Games\Engine\sayHello;
use function Brain\Games\Engine\getRandomNumber;
use function Brain\Games\Engine\askTheQuestion;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function findGcd(int $firstRandNum, int $secondRandNum): int
{
    $gcdCounter = $firstRandNum;
    while ($firstRandNum % $gcdCounter !== 0 || $secondRandNum % $gcdCounter !== 0) {
        $gcdCounter -= 1;
    }
    return $gcdCounter;
}

function getGcd(int $minVal, int $maxVal, int $gameAttempts): void
{
    $userName = sayHello('Find the greatest common divisor of given numbers.');

    $counter = 1;
    while ($counter <= $gameAttempts) {
        $firstRandNum = getRandomNumber($minVal, $maxVal);
        $secondRandNum = getRandomNumber($minVal, $maxVal);

        askTheQuestion("$firstRandNum $secondRandNum");

        $validAnswer = findGcd($firstRandNum, $secondRandNum);
        $userAnswer = (int) getUserAnswer();
        $answers = [$validAnswer, $userAnswer];

        $counter += showMessages(
            $answers,
            $counter,
            $gameAttempts,
            $userName
        );
    }
}
