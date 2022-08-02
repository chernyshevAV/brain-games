<?php

namespace Brain\Games\Games\Brain\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\game;

function brainEven()
{
    $name = greeting();

    line('Answer "yes" if the number is even, otherwise answer "no".');
    game($name, function () {
        $number = mt_rand(1, 100);
        line("Question: {$number}");
        return $number % 2 === 0 ? 'yes' : 'no';
    });
}
