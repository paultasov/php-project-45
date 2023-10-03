<?php

namespace Brain\Games\Apps\Calc;

use function cli\line;
use function Brain\Games\Cli\sayHello;
use function Brain\Games\Engine\getRandomNumber;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function calculate(): bool
{
    $userName = sayHello();
    $gameRule = 'What is the result of the expression?';
    line($gameRule);

    $operators = ['+', '-', '*'];

    $counter = 0;
    while ($counter < 3) {
        $firstRandNum = getRandomNumber();
        $secondRandNum = getRandomNumber();

        $randOperator = $operators[mt_rand(0, 2)];

        line("Question: $firstRandNum $randOperator $secondRandNum");

        $userAnswer = (int) getUserAnswer();

        $validAnswer = 0;

        switch ($randOperator) {
            case '+':
                $validAnswer += $firstRandNum + $secondRandNum;
                break;
            case '-':
                $validAnswer += $firstRandNum - $secondRandNum;
                break;
            case '*':
                $validAnswer += $firstRandNum * $secondRandNum;
                break;
        }

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
