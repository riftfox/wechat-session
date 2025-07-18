<?php

namespace Riftfox\Wechat\Session;

interface SessionInterface
{
    public function getOpenId():string;
    public function setOpenId(string $openId): SessionInterface;
    public function getSessionKey(): string;
    public function setSessionKey(string $sessionKey): SessionInterface;
    public function getUnionId():string;
    public function setUnionId(string $unionid): SessionInterface;
}