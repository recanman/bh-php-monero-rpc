<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface InPeers extends Status
{
    public function getInPeers(): int;
}
