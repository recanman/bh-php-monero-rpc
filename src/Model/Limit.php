<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface Limit
{
    public function getLimitDown(): int;

    public function getLimitUp(): int;
}
