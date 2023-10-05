<?php

namespace Brain\Games\Apps\Gcd;

use function cli\line;
use function Brain\Games\Cli\sayHello;
use function Brain\Games\Engine\getRandomNumber;
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

function getGcd(): bool
{
    $userName = sayHello();
    $gameRule = 'Find the greatest common divisor of given numbers.';
    line($gameRule);

    $counter = 0;
    while ($counter < 3) {
        $firstRandNum = getRandomNumber();
        $secondRandNum = getRandomNumber();

        $validAnswer = findGcd($firstRandNum, $secondRandNum);
        line("Question: $firstRandNum $secondRandNum");
        $userAnswer = (int) getUserAnswer();

        $result = showMessages($userAnswer, $validAnswer, $userName);

        if ($result) {
            $counter += 1;
        } else {
            return false;
        }
    }

    if ($counter === 3) {
        line("Congratulations, $userName!");
    }

    return false;
}
