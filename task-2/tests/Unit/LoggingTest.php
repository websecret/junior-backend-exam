<?php

namespace Tests\Unit;

use App\Services\Bar;
use App\Services\Foo;
use Psr\Log\LoggerInterface;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $fooLogFile = storage_path('logs/foo.log');
        $barLogFile = storage_path('logs/bar.log');
        @unlink($fooLogFile);
        @unlink($barLogFile);

        $foo = resolve(Foo::class);
        $foo->log(); // должен писать в storage/logs/foo.log
        $bar = resolve(Bar::class);
        $bar->log(); // должен писать в storage/logs/bar.log

        $this->assertFileExists($fooLogFile);
        $this->assertStringContainsString('Foo!', file_get_contents($fooLogFile));
        $this->assertFileExists($barLogFile);
        $this->assertStringContainsString('Bar!', file_get_contents($barLogFile));
    }
}
