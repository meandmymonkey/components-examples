<?php

namespace Demo;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TimeCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('demo:time')
            ->setDescription('Tells the time')
            ->addArgument('timezone', InputArgument::OPTIONAL, 'The timezone to use', 'Europe/Berlin')
            ->addOption('unix', null, InputOption::VALUE_NONE)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $timeZone = $input->getArgument('timezone');

        $now = new \DateTime();
        $now->setTimezone(new \DateTimeZone($timeZone));

        $timeString = $input->getOption('unix') ? $now->getTimestamp() : $now->format('H:i:s');

        $output->writeln(sprintf('<info>It is now %s in %s</info>', $timeString, $timeZone));
    }
}
