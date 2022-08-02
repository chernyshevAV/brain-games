<?php

namespace Brain\Games\Games\Brain\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\game;

/*
form an arithmetic sequence of random numbers and
'hide' one number
*/
function brainProgression()
{
    $name = greeting();

    line('What number is missing in the progression?');
    game($name, function () {
        /*
        create an array of several random numbers
        with the same increment step
        */
        $randomStart = mt_rand(1, 20);
        $randomStep = mt_rand(2, 10);
        $definiteEnd = 200; // specific number to avoid piling up digits
        $digitColl = range(
            $randomStart,
            $definiteEnd,
            $randomStep
        );
        // cut out required length part
        $sliceForExercise = array_slice($digitColl, 0, mt_rand(5, 10));
        //define a random number in array, save it as an answer and hide
        $missingNumberIndex = mt_rand(0, count($sliceForExercise) - 1);
        $answer = $sliceForExercise[$missingNumberIndex];
        $sliceForExercise[$missingNumberIndex] = '..';
        // concatenate the resulting array into a string
        $exerciseRow = implode(' ', $sliceForExercise);
        line("Question: {$exerciseRow}");
        return $answer;
    });
}
