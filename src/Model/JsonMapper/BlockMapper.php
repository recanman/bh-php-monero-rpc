<?php

namespace BrianHenryIE\MoneroRpc\Model\JsonMapper;

use BrianHenryIE\MoneroRpc\Model\Block;
use BrianHenryIE\MoneroRpc\Model\BlockHeader;

class BlockMapper implements Block
{
    use ResponseBaseTrait;

    protected string $blob;
    protected BlockHeaderMapper $blockHeader;
    protected int $credits;
    protected string $json;
    protected string $minerTxHash;
    protected string $topHash;
    /** @var string[] */
    protected array $txHashes;

    public function getBlob(): string
    {
        return $this->blob;
    }

    public function getBlockHeader(): BlockHeader
    {
        return $this->blockHeader;
    }

    public function getCredits(): int
    {
        return $this->credits;
    }

    public function getJson(): string
    {
        return $this->json;
    }

    public function getMinerTxHash(): string
    {
        return $this->minerTxHash;
    }

    public function getTopHash(): string
    {
        return $this->topHash;
    }

    /**
     * @return string[]
     */
    public function getTxHashes(): array
    {
        return $this->txHashes;
    }

    public function setBlob(string $blob): void
    {
        $this->blob = $blob;
    }

    public function setBlockHeader(BlockHeaderMapper $blockHeader): void
    {
        $this->blockHeader = $blockHeader;
    }

    public function setCredits(int $credits): void
    {
        $this->credits = $credits;
    }

    public function setJson(string $json): void
    {
        $this->json = $json;
    }

    public function setMinerTxHash(string $minerTxHash): void
    {
        $this->minerTxHash = $minerTxHash;
    }

    public function setTopHash(string $topHash): void
    {
        $this->topHash = $topHash;
    }

    /**
     * @param string[] $txHashes
     */
    public function setTxHashes(array $txHashes): void
    {
        $this->txHashes = $txHashes;
    }
}
