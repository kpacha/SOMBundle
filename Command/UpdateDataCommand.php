<?php

namespace Kpacha\SOMBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('som:updatescan')
            ->setDescription('Updates the data collected the last scan period');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<comment>Updating the data collected the last scan period</comment>");

        $total = $this->getContainer()->get('kpacha_som.tracker')->updateScan();
        
        $output->writeln("Updated websites: <info>[$total]</info>");
    }

}
