<?php

namespace BrianHenryIE\MoneroRpc\Model;

interface Limit
{
    public function getLimitDown(): int;

    public function getLimitUp(): int;
}
