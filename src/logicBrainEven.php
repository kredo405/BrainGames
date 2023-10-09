<?php

namespace BrainGames\logicBrainEven;

use function BrainGames\checkingAnswer\checkingAnswer;
use function cli\line;

function logicBrainEven($questions, $answers, $name)
{
    $countCorrectAnswers = 0;

    foreach ($questions as $index => $question) {
        $result = checkingAnswer($answers[$index], $question);

        if (!$result) {
            line("Давай еще раз попробуем, {$name}!");

            return;
        } else {
            $countCorrectAnswers++;
        }
    }

    if ($countCorrectAnswers === 3) {
        line("Поздравляем, {$name}!");
    }
}
