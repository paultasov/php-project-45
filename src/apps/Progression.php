<?php

namespace Brain\Games\Apps\Progression;

use function Brain\Games\Engine\sayHello;
use function Brain\Games\Engine\getRandomNumber;
use function Brain\Games\Engine\askTheQuestion;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function makeProgression(): int
{
    $progressionLen = getRandomNumber(25, 60);
    $progressionStep = getRandomNumber(3, 5);

    $progressionNums = [];
    $stepCounter = 0;

    for ($i = 0; $i < $progressionLen; $i += $progressionStep) {
        $stepCounter += $progressionStep;
        $progressionNums[] = $stepCounter;
    }

    $dotsPosition = getRandomNumber(0, count($progressionNums) - 1);
    $hiddenArrNum = $progressionNums[$dotsPosition];
    $progressionNums[$dotsPosition] = '..';

    $str = implode(' ', $progressionNums);
    askTheQuestion($str);

    return $hiddenArrNum;
}

function showProgression(int $gameAttempts): void
{
    $userName = sayHello('What number is missing in the progression?');

    $counter = 1;
    while ($counter <= $gameAttempts) {
        $validAnswer = makeProgression();
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
