<?php

namespace BladeBuilder\Commands;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Init extends Command
{
    protected $viewsPath = '/views';
    protected $layoutPath = '/_layouts';
    protected $partialsPath = '/_partials';
    protected $cachePath = '/cache';
    protected $outputPath = '/compiled';
    protected $publicPath = '/public';

    protected function configure()
    {
        $this
            ->setName('init')
            ->setDescription('Initialize project');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filesystem = new Filesystem();
        $filesystem->makeDirectory(getcwd().$this->viewsPath, 0775, false, true);
        $filesystem->makeDirectory(getcwd().$this->viewsPath.$this->layoutPath, 0775, false, true);
        $filesystem->makeDirectory(getcwd().$this->viewsPath.$this->partialsPath, 0775, false, true);
        $filesystem->makeDirectory(getcwd().$this->cachePath, 0775, false, true);
        $filesystem->makeDirectory(getcwd().$this->outputPath, 0775, false, true);
        $filesystem->makeDirectory(getcwd().$this->publicPath, 0775, false, true);

        $filesystem->copy(__DIR__.'/../index.php', getcwd().$this->publicPath.'/index.php');

        $output->writeln("Initialization complete!");
    }
}
