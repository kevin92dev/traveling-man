<?php

namespace App\Application\Command;

class GetShortestPathCommand
{
    /**
     * @var string
     */
    private $file;

    /**
     * GetShortestPathCommand constructor.
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getFile(): ?string
    {
        return $this->file;
    }
}
