<?php

namespace BrainGames\checkingAnswer;

use function cli\line;
use function cli\prompt;

function checkingAnswer($answer, $question)
{
    line("Вопрос {$question}");
    $userAnswer = prompt('Ваш ответ?');

    if ($userAnswer === $answer) {
        line("Верно!");

        return true;
    } else {
        line("{$userAnswer} — неправильный ответ ;(. Правильный ответ — «{$answer}».");

        return false;
    }
}
