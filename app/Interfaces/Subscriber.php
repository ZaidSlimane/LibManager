<?php

namespace App\Interfaces;

interface Subscriber
{
    public function sendUpdateNotification($message);
}
