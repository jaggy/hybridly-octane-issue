<?php

namespace App\Http\Middleware;

use App\Data\SecurityData;
use App\Data\SharedData;
use App\Data\UserData;
use Hybridly\Http\Middleware;

class HandleSecondHybridRequests extends Middleware
{
    /**
     * Defines the properties that are shared to all requests.
     */
    public function share()
    {
        return [
            'two' => '222',
            'lazyTwo' => fn () => '222',
        ];
    }
}
