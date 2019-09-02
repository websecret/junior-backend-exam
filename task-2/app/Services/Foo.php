<?php


namespace App\Services;


use Psr\Log\LoggerInterface;

class Foo
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function log()
    {
        $this->logger->info('Foo!'); // должен писать в storage/logs/foo.log
    }
}
