<?php

namespace Riftfox\Wechat\Session;

interface SessionFactoryInterface
{
    public function createSessionFromArray(array $data): SessionInterface;
}