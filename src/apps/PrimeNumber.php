<?php

namespace Brain\Games\Apps\PrimeNumber;

use function Brain\Games\Engine\sayHello;
use function Brain\Games\Engine\getRandomNumber;
use function Brain\Games\Engine\askTheQuestion;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function checkIfPrime(int $randNum): string
{
    for ($i = 2; $i < $randNum; $i += 1) {
        if ($randNum % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function isPrime(int $minVal, int $maxVal, int $gameAttempts): void
{
    $userName = sayHello('Answer "yes" if given number is prime. Otherwise, answer "no".');

    $counter = 1;
    while ($counter <= $gameAttempts) {
        $randNum = getRandomNumber($minVal, $maxVal);

        askTheQuestion((string) $randNum);

        $validAnswer = checkIfPrime($randNum);
        $userAnswer = getUserAnswer();
        $answers = [$validAnswer, $userAnswer];

        $counter += showMessages(
            $answers,
            $counter,
            $gameAttempts,
            $userName
        );
    }
}
