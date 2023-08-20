<?php

namespace BrianHenryIE\MoneroRpc\Model\JsonMapper;

trait ResponseBaseTrait
{
    protected string $status;
    protected bool $untrusted;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getUntrusted(): bool
    {
        return $this->untrusted;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setUntrusted(bool $untrusted): void
    {
        $this->untrusted = $untrusted;
    }
}
