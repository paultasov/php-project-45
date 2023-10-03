<?php

namespace Brain\Games\Apps\EvenOrOdd;

use function cli\line;
use function Brain\Games\Cli\sayHello;
use function Brain\Games\Engine\getRandomNumber;
use function Brain\Games\Engine\getUserAnswer;
use function Brain\Games\Engine\showMessages;

function guessEvenOrOdd(): bool
{
    $userName = sayHello();
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no".';
    line($gameRule);

    $counter = 0;
    while ($counter < 3) {
        $randNum = getRandomNumber();
        line("Question: $randNum");
        $userAnswer = getUserAnswer();

        $validAnswer = ($randNum % 2 === 0) ? 'yes' : 'no';

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
