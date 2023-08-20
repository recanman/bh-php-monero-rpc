<?php

namespace BrianHenryIE\MoneroRpc\Model;

interface InPeers extends ResponseBase
{
    public function getInPeers(): int;
}
