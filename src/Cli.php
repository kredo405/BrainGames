<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function velcome() {
    line('Добро пожаловать в интелектуальные игры!');
    $name = prompt('Можно узнать ваше имя?');
    line("Привет, %s!", $name);
}