<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface Status
{
    /**
     * General RPC error code. "OK" means everything looks good.
     *
     * "OK"|"BUSY"|"Mining never started".
     */
    public function getStatus(): string;

    /**
     * States if the result is obtained using the bootstrap mode, and is therefore not trusted (true), or when the
     * daemon is fully synced and thus handles the RPC locally (false)
     */
    public function getUntrusted(): bool;
}
