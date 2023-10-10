<?php

namespace BrainGames\games;

use BrainGames\Engine;

class PlayBrainCalc
{
    public static function play()
    {
        $name = Engine::velcome();
        define("COUNT_ANSWERS", 3);
        $countCorrectAnswers = 0;
        $arrNumbersForMathOperation = [0, 1, 2]; // 0 - +, 1 - *, 2 - -;

        Engine::askQuestion("Каков результат выражения?");

        foreach ($arrNumbersForMathOperation as $num) {
            $num1 = rand(1, 10);
            $num2 = rand(1, 10);
            $rundNumber = rand(0, 2);
            $mathOperation;
            $answer;


            if ($arrNumbersForMathOperation[$rundNumber] === 0) {
                $mathOperation = "+";
                $answer = $num1 + $num2;
            } elseif ($arrNumbersForMathOperation[$rundNumber] === 1) {
                $mathOperation = "*";
                $answer = $num1 * $num2;
            } else {
                $mathOperation = "-";
                $answer = $num1 - $num2;
            }

            $result = Engine::checkingAnswer("{$num1} {$mathOperation} {$num2}", (string) $answer);

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
}
