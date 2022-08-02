<?php

namespace Brain\Games\Games\Brain\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\game;

function brainProgression()
{
    $name = greeting();

    line('What number is missing in the progression?');
    game($name, function () {
        $randomStart = mt_rand(1, 20);
        $randomStep = mt_rand(2, 10);
        $definiteEnd = 200;
        $digitColl = range(
            $randomStart,
            $definiteEnd,
            $randomStep
        );
        $exerciseSlice = array_slice($digitColl, 0, mt_rand(5, 10));
        $missingNumberIndex = mt_rand(0, count($exerciseSlice) - 1);
        $answer = $exerciseSlice[$missingNumberIndex];
        $exerciseSlice[$missingNumberIndex] = '..';
        $exerciseRow = implode(' ', $exerciseSlice);
        line("Question: {$exerciseRow}");
        return $answer;
    });
}
