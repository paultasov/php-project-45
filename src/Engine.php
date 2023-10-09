<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

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
    }

    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answers[1], $answers[0]);
    line("Let's try again, %s!", $userName);
    return $counter + $gameAttempts;
}
