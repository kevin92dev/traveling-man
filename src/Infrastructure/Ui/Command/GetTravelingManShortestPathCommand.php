<?php

namespace App\Infrastructure\Ui\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use App\Application\Handler\GetShortestPathHandler;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GetTravelingManShortestPathCommand
 */
class GetTravelingManShortestPathCommand extends Command
{
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
            ->setDescription('Return the shortest path for a given cities file using his coordinates');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $route = $this->handler->handle();
        } catch (\Exception $e) {
            echo $e->getMessage();

            return Command::FAILURE;
        }

        foreach ($route as $destination) {
            echo $destination.PHP_EOL;
        }

        return Command::SUCCESS;
    }
}