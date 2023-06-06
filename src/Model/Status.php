<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface Status
{
    /**
     * "OK"|"BUSY"|"Mining never started".
     */
    public function getStatus(): string;

    public function getUntrusted(): bool;
}
