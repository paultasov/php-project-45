<?php

namespace Brain\Games\Apps\EvenOrOdd;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\sayHello;

function guessEvenOrOdd()
{
    $userName = sayHello();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $counter = 0;

    while ($counter < 3) {
        $randomNum = mt_rand(0, 10);

        line("Question: {$randomNum}");
        $userAnswer = prompt('Your answer');

        if ($randomNum % 2 === 0 && $userAnswer === 'yes' || $randomNum % 2 !== 0 && $userAnswer === 'no') {
            line('Correct!');
            $counter += 1;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, {$userName}!");
            return false;
        }
    }

    line("Congratulations, {$userName}!");
    return true;
}
