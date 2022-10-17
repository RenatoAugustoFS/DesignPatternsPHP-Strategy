<?php

namespace DifferDev\Logger;

use DifferDev\Logger\Strategy\WriterStraregy;

class MyLogger
{
    public function __construct(
        protected WriterStraregy $writer
    ) {
        #code...
    }

    public function error(string $message): void
    {
        $this->writer->error($message);
    }

    public function warning(string $message): void
    {
        $this->writer->warning($message);
    }
}