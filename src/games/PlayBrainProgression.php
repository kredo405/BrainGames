<?php

namespace BrainGames\games;

use BrainGames\Engine;

class PlayBrainProgression
{
    public static function play()
    {
        $name = Engine::velcome();
        define("COUNT_ANSWERS", 3);
        $countCorrectAnswers = 0;

        Engine::askQuestion("Каков результат выражения?");

        for ($i = 0; $i < COUNT_ANSWERS; $i++) {
            [$progression, $hiddenValue] = PlayBrainProgression::generateProgression();

            $result = Engine::checkingAnswer(implode(' ', $progression), (string) $hiddenValue);

            if (!$result) {
                Engine::loseOutput($name);

                return;
            } else {
                $countCorrectAnswers++;
            }
        }

        if ($countCorrectAnswers === COUNT_ANSWERS) {
            Engine::winOutput($name);
        }
    }

    public static function generateProgression($minLength = 5, $maxLength = 10)
    {
        // Определите длину прогрессии
        $length = rand($minLength, $maxLength);

        // Определите начальное число и разницу
        $start = rand(1, 100);
        $difference = rand(1, 10);

        $progression = [];
        for ($i = 0; $i < $length; $i++) {
            $progression[] = $start + $i * $difference;
        }

        // Замените случайный элемент на две точки
        $hiddenIndex = rand(0, $length - 1);
        $hiddenValue = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';

        return [$progression, $hiddenValue];
    }
}
