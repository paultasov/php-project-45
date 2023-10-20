<?php

namespace BrainGames\Apps\PrimeNumber;

use function BrainGames\Engine\sayHello;
use function BrainGames\Engine\askTheQuestion;
use function BrainGames\Engine\compareAnswers;

function checkIfPrime(int $randNum): string
{
    askTheQuestion((string) $randNum);

    for ($i = 2; $i < $randNum; $i += 1) {
        if ($randNum % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function isPrime(int $minVal, int $maxVal): void
{
    $range = [$minVal, $maxVal];
    $gameTag = 'prime';
    $userName = sayHello('Answer "yes" if given number is prime. Otherwise answer "no".');

    compareAnswers($range, $gameTag, $userName);
}
