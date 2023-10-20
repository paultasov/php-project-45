<?php

namespace BrainGames\Apps\EvenOrOdd;

use function BrainGames\Engine\sayHello;
use function BrainGames\Engine\askTheQuestion;
use function BrainGames\Engine\compareAnswers;

function compareYesOrNo(int $randNum): string
{
    askTheQuestion((string) $randNum);
    return $randNum % 2 === 0 ? 'yes' : 'no';
}

function guessEvenOrOdd(int $minVal, int $maxVal): void
{
    $range = [$minVal, $maxVal];
    $gameTag = 'even';
    $userName = sayHello('Answer "yes" if the number is even, otherwise answer "no".');

    compareAnswers($range, $gameTag, $userName);
}
