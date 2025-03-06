<?php

namespace App\Enum;

enum Statues: string
{
    case FELDOLGOZATLAN = "FELDOLGOZATLAN";
    case FOLYAMATBAN = "FOLYAMATBAN";
    case KESZ = "KESZ";
}
