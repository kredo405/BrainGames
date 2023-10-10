<?php

namespace BrainGames\games;

use function cli\line;

use BrainGames\Engine;

class PlayBrainEven
{
    public static function play()
    {
        $name = Engine::velcome();
        define("COUNT_ANSWERS", 3);
        $countCorrectAnswers = 0;
        $answers = ["да", "нет", "да"];
        $questions = ["12", "3", "26"];

        Engine::askQuestion("Ответьте «да», если число четное, в противном случае ответьте «нет»");

        foreach ($questions as $index => $question) {
            $result = Engine::checkingAnswer($question, $answers[$index]);

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
