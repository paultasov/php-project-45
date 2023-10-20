<?php

namespace BrainGames\Apps\Progression;

use function BrainGames\Engine\getRandomNumber;
use function BrainGames\Engine\sayHello;
use function BrainGames\Engine\askTheQuestion;
use function BrainGames\Engine\compareAnswers;

function makeProgression(int $minVal, int $maxVal): int
{
    $progressionLen = getRandomNumber($minVal, $maxVal);
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

function showProgression(int $minVal, int $maxVal): void
{
    $range = [$minVal, $maxVal];
    $gameTag = 'progression';
    $userName = sayHello('What number is missing in the progression?');

    compareAnswers($range, $gameTag, $userName);
}
