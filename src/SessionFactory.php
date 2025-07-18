<?php

namespace Riftfox\Wechat\Session;

use Riftfox\Wechat\Session\SessionFactoryInterface;

class SessionFactory implements SessionFactoryInterface
{

    public function createSessionFromArray(array $data): SessionInterface
    {
        // TODO: Implement createSessionFromArray() method.
        $session = new Session();
        if(isset($data['appid'])) {
            $session->setOpenId($data['appid']);
        }
        if(isset($data['session_key'])) {
            $session->setSessionKey($data['session_key']);
        }
        if(isset($data['unionid'])) {
            $session->setUnionId($data['unionid']);
        }
        return $session;
    }
}