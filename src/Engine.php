<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

class Engine
{
    public static function velcome()
    {
        line('Добро пожаловать в интелектуальные игры!');
        $name = prompt('Можно узнать ваше имя?');
        line("Привет, %s!", $name);

        return $name;
    }

    public static function checkingAnswer($question, $answer)
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

    public static function loseOutput($name)
    {
        line("Давай еще раз попробуем, {$name}!");
    }

    public static function winOutput($name)
    {
        line("Поздравляем, {$name}!");
    }

    public static function askQuestion($question)
    {
        line("{$question}");
    }
}
