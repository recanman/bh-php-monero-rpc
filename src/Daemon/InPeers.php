<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface InPeers extends ResponseBase
{
    public function getInPeers(): int;
}
