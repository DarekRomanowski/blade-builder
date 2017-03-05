<?php

namespace BladeBuilder\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Clear extends Command
{
    protected $cachePath;
    protected $outputPath;

    public function __construct($name, $projectPath)
    {
        $this->cachePath = $projectPath.'/cache';
        $this->outputPath = $projectPath.'/compiled';
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setName('clear')
            ->setDescription('Build html files based on blade views');
    }
}
