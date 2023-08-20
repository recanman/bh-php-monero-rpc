<?php

namespace BrianHenryIE\MoneroRpc\Daemon;

interface Limit
{
    public function getLimitDown(): int;

    public function getLimitUp(): int;
}
