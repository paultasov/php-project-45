<?php

namespace Brain\Games\Apps\Progression;

use function cli\line;
use function Brain\Games\Cli\sayHello;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function makeProgression(): int
{
    $progressionLen = mt_rand(25, 60);
    $progressionStep = mt_rand(3, 5);

    $progressionNums = [];
    $stepCounter = 0;

    for ($i = 0; $i < $progressionLen; $i += $progressionStep) {
        $stepCounter += $progressionStep;
        $progressionNums[] = $stepCounter;
    }

    $dotsPosition = mt_rand(0, count($progressionNums) - 1);
    $hiddenArrNum = $progressionNums[$dotsPosition];
    $progressionNums[$dotsPosition] = '...';

    $str = implode(' ', $progressionNums);
    line("Question: $str");

    return $hiddenArrNum;
}

function showProgression(): bool
{
    $userName = sayHello();
    $gameRule = 'What number is missing in the progression?';
    line($gameRule);

    $counter = 0;
    while ($counter < 3) {
        $validAnswer = makeProgression();
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
