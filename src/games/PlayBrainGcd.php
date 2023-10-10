<?php

namespace BrainGames\games;

use BrainGames\Engine;

class PlayBrainGcd
{
    public static function play()
    {
        $name = Engine::velcome();
        define("COUNT_ANSWERS", 3);
        $countCorrectAnswers = 0;

        Engine::askQuestion("Найдите наибольший общий делитель данных чисел");

        for ($i = 0; $i < COUNT_ANSWERS; $i++) {
            $num1 = rand(1, 100);
            $num2 = rand(1, 100);
            $answer = PlayBrainGcd::gcd($num1, $num2);

            $result = Engine::checkingAnswer("{$num1} {$num2}", $answer);

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

    public static function gcd($a, $b)
    {
        while ($b != 0) {
            $t = $b;
            $b = $a % $b;
            $a = $t;
        }
        return $a;
    }
}
