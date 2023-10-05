<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function getRandomNumber(): int
{
    return mt_rand(1, 50);
}

function getUserAnswer(): string
{
    return prompt('Your answer');
}

function showMessages(string|int $userAnswer, string|int $validAnswer, string $userName): bool
{
    if ($userAnswer === $validAnswer) {
        line('Correct!');
        return true;
    }

    line("'$userAnswer' is wrong answer ;(. Correct answer was '$validAnswer'.");
    line("Let's try again, $userName!");
    return false;
}
