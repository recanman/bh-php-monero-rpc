<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface InPeers extends ResponseBase
{
    public function getInPeers(): int;
}
