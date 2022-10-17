<?php

use DifferDev\Logger\MyLogger;
use DifferDev\Logger\Strategy\WriterStraregy;
use DifferDev\Logger\Writer\ConsoleWriter;
use DifferDev\Logger\Writer\FileWriter;

class MyLoggerTest extends PHPUnit\Framework\TestCase
{
    protected MyLogger $consoleLog;
    
    protected MyLogger $fileLog;

    public function setUp(): void
    {
        chdir(__DIR__);
        $this->consoleLog = new MyLogger(new WriterStraregy(new ConsoleWriter()));
        $this->fileLog = new MyLogger(new WriterStraregy(new FileWriter('.', 'logs.txt')));
    }

    public function tearDown(): void
    {
        if (file_exists('logs.txt')) {
            unlink('logs.txt');
        }
    }

    public function testClassLoggerShouldLogErrorInConsole()
    {
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Error: Olá mundo via logger\n");

        $this->consoleLog->error($message);
    }

    public function testClassLoggerShouldLogWarningInConsole()
    {
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Warning: Olá mundo via logger\n");

        $this->consoleLog->warning($message);
    }

    public function testClassLoggerShouldLogErrorInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->error($message);

        $this->assertFileEquals('fixtures/log_error.txt', 'logs.txt');
    }

    public function testClassLoggerShouldLogWarningInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->warning($message);

        $this->assertFileEquals('fixtures/log_warning.txt', 'logs.txt');
    }
}