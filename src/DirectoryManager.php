<?php

namespace KashifSaadat\DirectoryManager;

class DirectoryManager
{
    protected $paths;

    public function __construct()
    {
        $this->paths = new \SplDoublyLinkedList;
    }

    public function cd($path)
    {
        $this->getPaths()->push($this->getCwd());
        chdir($path);
    }

    public function reset()
    {
        if (!$this->getPaths()->isEmpty()) {
            chdir($this->getPaths()->pop());
        }
    }

    public function getCwd()
    {
        return getcwd();
    }

    public function getPaths()
    {
        return $this->paths;
    }
}
