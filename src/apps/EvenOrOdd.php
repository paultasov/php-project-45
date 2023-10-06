<?php

namespace Brain\Games\Apps\EvenOrOdd;

use function Brain\Games\Engine\sayHello;
use function Brain\Games\Engine\getRandomNumber;
use function Brain\Games\Engine\askTheQuestion;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function compareYesOrNo(int $randNum): string
{
    return $randNum % 2 === 0 ? 'yes' : 'no';
}

function guessEvenOrOdd(int $minVal, int $maxVal, int $gameAttempts): void
{
    $userName = sayHello('Answer "yes" if the number is even, otherwise answer "no".');

    $counter = 1;
    while ($counter <= $gameAttempts) {
        $randNum = getRandomNumber($minVal, $maxVal);

        askTheQuestion((string) $randNum);

        $validAnswer = compareYesOrNo($randNum);
        $userAnswer = getUserAnswer();

        $counter += showMessages(
            $userAnswer,
            $validAnswer,
            $counter,
            $gameAttempts,
            $userName
        );
    }
}
