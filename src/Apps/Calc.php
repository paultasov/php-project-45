<?php

namespace BrainGames\Apps\Calc;

use function BrainGames\Engine\sayHello;
use function BrainGames\Engine\compareAnswers;
use function BrainGames\Engine\askTheQuestion;

function doMathOperation(string $randOperator, int $firstRandNum, int $secondRandNum): int
{
    askTheQuestion("$firstRandNum $randOperator $secondRandNum");

    $correctVal = 0;
    switch ($randOperator) {
        case '+':
            $correctVal += $firstRandNum + $secondRandNum;
            break;
        case '-':
            $correctVal += $firstRandNum - $secondRandNum;
            break;
        case '*':
            $correctVal += $firstRandNum * $secondRandNum;
            break;
        default:
            print_r("ERROR: Incorrect operator received\n");
    }
    return $correctVal;
}

function calculate(int $minVal, int $maxVal): void
{
    $range = [$minVal, $maxVal];
    $gameTag = 'calc';
    $userName = sayHello('What is the result of the expression?');

    compareAnswers($range, $gameTag, $userName);
}
