<?php


namespace App\Services;


use Psr\Log\LoggerInterface;

class Bar
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function log()
    {
        $this->logger->info('Bar!'); // должен писать в storage/logs/bar.log
    }
}
