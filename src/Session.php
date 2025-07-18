<?php

namespace Riftfox\Wechat\Session;

use Riftfox\Wechat\Session\SessionInterface;

class Session implements SessionInterface
{
    private ?string $openId = null;
    private ?string $sessionKey = null;
    private ?string $unionId = null;

    public function getOpenId(): string
    {
        return $this->openId;
    }

    public function getSessionKey(): string
    {
        return $this->sessionKey;
    }

    public function getUnionId(): string
    {
        return $this->unionId;
    }

    public function setOpenId(string $openId): self
    {
        $this->openId = $openId;
        return $this;
    }

    public function setSessionKey(string $sessionKey): self
    {
        $this->sessionKey = $sessionKey;
        return $this;
    }

    public function setUnionId(?string $unionId): self
    {
        $this->unionId = $unionId;
        return $this;
    }
}