<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

interface BlockCount extends Status
{
    public function getCount(): int;
}
