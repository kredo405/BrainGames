<?php

namespace BrainGames\games;

use BrainGames\Engine;

class PlayBrainPrime
{
    public static function play()
    {
        $name = Engine::velcome();
        define("COUNT_ANSWERS", 3);
        $countCorrectAnswers = 0;

        Engine::askQuestion("Ответьте «да», если данное число простое. В противном случае ответьте «нет»");

        $numbers = [6, 17, 2];

        foreach ($numbers as $num) {
            $answer = PlayBrainPrime::isPrime($num) ? "да" : "нет";

            $result = Engine::checkingAnswer($num, (string) $answer);

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

    public static function isPrime($number)
    {
        if ($number <= 1) {
            return false;
        }
        if ($number <= 3) {
            return true;
        }
        if ($number % 2 == 0 || $number % 3 == 0) {
            return false;
        }
        $i = 5;
        while ($i * $i <= $number) {
            if ($number % $i == 0 || $number % ($i + 2) == 0) {
                return false;
            }
            $i += 6;
        }
        return true;
    }
}
