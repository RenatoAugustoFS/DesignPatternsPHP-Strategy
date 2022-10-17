<?php

namespace DifferDev\Logger\Strategy;

use DifferDev\Logger\Interface\WriterInterface;

class WriterStraregy implements WriterInterface
{
    public function __construct(
       protected WriterInterface $writer
    ) {
        #code...
    }

    public function error(string $message): void
    {
        $formatedMessage = 'Error: ' . $message . "\n";

        $this->writer->error($formatedMessage);
    }

    public function warning(string $message): void
    {
        $formatedMessage = 'Warning: ' . $message . "\n";

        $this->writer->error($formatedMessage);
    }
}