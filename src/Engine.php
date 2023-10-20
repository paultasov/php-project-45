<?php

namespace BrainGames\Engine;

use function Cli\line;
use function Cli\prompt;
use function BrainGames\Apps\Calc\doMathOperation;
use function BrainGames\Apps\Gcd\findGcd;
use function BrainGames\Apps\EvenOrOdd\compareYesOrNo;
use function BrainGames\Apps\PrimeNumber\checkIfPrime;
use function BrainGames\Apps\Progression\makeProgression;

function sayHello(string $gameRule): string
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line('%s', $gameRule);

    return $userName;
}

function getRandomNumber(int $minVal, int $maxValue): int
{
    return mt_rand($minVal, $maxValue);
}

function askTheQuestion(string $str): void
{
    line("Question: %s", $str);
}

function getUserAnswer(): string
{
    return prompt('Your answer');
}

function showMessages(
    array $answers,
    int $counter,
    int $gameAttempts,
    string $userName
): int {
    switch (true) {
        case $counter === $gameAttempts && $answers[0] === $answers[1]:
            line("Congratulations, %s!", $userName);
            return $counter;
        case $answers[0] === $answers[1]:
            line('Correct!');
            return true;
        default:
            print_r("ERROR: Incorrect data received\n");
    }

    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answers[1], $answers[0]);
    line("Let's try again, %s!", $userName);
    return $counter + $gameAttempts;
}

function compareAnswers(...$args): void
{
    [$range, $gameTag, $userName] = $args;
    [$minVal, $maxVal] = $range;

    $counter = 1;
    while ($counter <= $gameAttempts = 3) {
        $firstRandNum = getRandomNumber($minVal, $maxVal);
        $secondRandNum = getRandomNumber($minVal, $maxVal);

        $validAnswer = '';
        $userAnswer = '';
        switch ($gameTag) {
            case 'even':
                $validAnswer = compareYesOrNo($firstRandNum);
                $userAnswer = getUserAnswer();
                break;
            case 'prime':
                $validAnswer = checkIfPrime($firstRandNum);
                $userAnswer = getUserAnswer();
                break;
            case 'calc':
                $operators = ['+', '-', '*'];
                $randOperator = $operators[getRandomNumber(0, 2)];
                $validAnswer = doMathOperation($randOperator, $firstRandNum, $secondRandNum);
                $userAnswer = (int) getUserAnswer();
                break;
            case 'gcd':
                $validAnswer = findGcd($firstRandNum, $secondRandNum);
                $userAnswer = (int) getUserAnswer();
                break;
            case 'progression':
                $validAnswer = makeProgression($minVal, $maxVal);
                $userAnswer = (int) getUserAnswer();
                break;
            default:
                print_r("ERROR: Incorrect game name received\n");
        }

        $answers = [$validAnswer, $userAnswer];

        $counter += showMessages(
            $answers,
            $counter,
            $gameAttempts,
            $userName
        );
    }
}
