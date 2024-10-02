<?php

namespace App\DataProvider\Endpoint;

readonly class ListingDelistingStatusParams
{
    public function __construct(public StateParam $state) {}
}

enum StateParam: string
{
    case ACTIVE = 'active';
    case DELISTED = 'delisted';
}
