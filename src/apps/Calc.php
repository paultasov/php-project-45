<?php

namespace Brain\Games\Apps\Calc;

use function Brain\Games\Engine\sayHello;
use function Brain\Games\Engine\getRandomNumber;
use function Brain\Games\Engine\askTheQuestion;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function doMathOperation(string $randOperator, int $firstRandNum, int $secondRandNum): int
{
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
    }
    return $correctVal;
}

function calculate(int $minVal, int $maxVal, int $gameAttempts): void
{
    $userName = sayHello('What is the result of the expression?');

    $operators = ['+', '-', '*'];

    $counter = 1;
    while ($counter <= $gameAttempts) {
        $firstRandNum = getRandomNumber($minVal, $maxVal);
        $secondRandNum = getRandomNumber($minVal, $maxVal);
        $randOperator = $operators[getRandomNumber(0, 2)];

        askTheQuestion("$firstRandNum $randOperator $secondRandNum");

        $validAnswer = doMathOperation($randOperator, $firstRandNum, $secondRandNum);
        $userAnswer = (int) getUserAnswer();

        $counter += showMessages(
            $userAnswer,
            $validAnswer,
            $counter,
            $gameAttempts,
            $userName
        );
    }
}
