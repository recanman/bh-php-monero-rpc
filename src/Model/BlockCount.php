<?php

namespace BrianHenryIE\MoneroDaemonRpc\Model;

use BrianHenryIE\MoneroDaemonRpc\Model\Status;

interface BlockCount
{
    public function getCount(): int;
}
