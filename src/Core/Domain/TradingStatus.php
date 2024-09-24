<?php

namespace App\Core\Domain;

enum TradingStatus: string
{
    case ACTIVE = 'active';
    case DELISTED = 'delisted';
}
