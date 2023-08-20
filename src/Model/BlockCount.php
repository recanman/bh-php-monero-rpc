<?php

/**
 * @see https://www.getmonero.org/resources/developer-guides/daemon-rpc.html#get_block_count
 */

namespace BrianHenryIE\MoneroRpc\Model;

interface BlockCount extends ResponseBase
{
    /**
     * Number of blocks in the longest chain seen by the node.
     */
    public function getCount(): int;
}
