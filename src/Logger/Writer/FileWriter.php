<?php

namespace DifferDev\Logger\Writer;

use DifferDev\Logger\Interface\WriterInterface;

class FileWriter implements WriterInterface
{
    public function __construct(
        protected string $path,
        protected string $filename
    ) {
        #code...
    }

    public function error(string $message): void
    {
        $this->writeFile($message);
    }

    public function warning(string $message): void
    {
        $this->writeFile($message);
    }

    private function writeFile(string $message): void
    {
        $fileDir = $this->path . "/$this->filename";

        file_put_contents($fileDir, $message);
    }
}