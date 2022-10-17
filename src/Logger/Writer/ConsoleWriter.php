<?php

namespace DifferDev\Logger\Writer;

use DifferDev\Logger\Interface\WriterInterface;

class ConsoleWriter implements WriterInterface
{
    public function error(string $message): void
    {
        echo $message;
    }

    public function warning(string $message): void
    {
        echo $message;
    }
}