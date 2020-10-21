<?php

namespace App\Infrastructure\Ui\Command;

use App\Application\Command\GetShortestPathCommand;
use App\Application\Handler\GetShortestPathHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GetTravelingManShortestPathCommand
 */
class GetTravelingManShortestPathCommand extends Command
{
    const DEFAULT_CITIES_FILE = 'cities.txt';

    /**
     * @var GetShortestPathHandler
     */
    private $handler;

    /**
     * GetTravelingManShortestPathCommand constructor.
     *
     * @param GetShortestPathHandler $handler
     */
    public function __construct(GetShortestPathHandler $handler)
    {
        $this->handler = $handler;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:get-traveling-man-shortest-path')
            ->setDescription('Return the shortest path for a given cities file using his coordinates')
            ->addArgument('cities-file', InputArgument::OPTIONAL, 'Specify the file name, assuming that the reading folder is /public');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $citiesFile = $input->getArgument('cities-file');

        if (!$citiesFile) {
            $citiesFile = self::DEFAULT_CITIES_FILE;
        }

        try {
            $shortestPath = $this->handler->handle(new GetShortestPathCommand($citiesFile));
        } catch (\Exception $e) {
            echo $e->getMessage();

            return Command::FAILURE;
        }

        exit;

        echo "| Client\t | Month\t | Suspicious\t | Median\t |".PHP_EOL;
        echo '------------------------------------------------------------------'.PHP_EOL;

        foreach ($suspiciousReadings as $suspiciousReading) {
            $periodParts = explode('-', $suspiciousReading['period']);
            echo '| '.$suspiciousReading['client']."\t";
            echo ' | '.$periodParts[1]."\t\t";
            echo ' | '.$suspiciousReading['reading']."\t\t";
            echo ' | '.$suspiciousReading['median']."\t";
            echo ' |'.PHP_EOL;
        }

        return Command::SUCCESS;
    }
}