<?php

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JwtSubscriber
{
    public function updateJwtData(JWTCreatedEvent $event)
    {
        dd($event);
    }
}
