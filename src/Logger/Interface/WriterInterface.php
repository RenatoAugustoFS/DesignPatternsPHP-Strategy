<?php

namespace DifferDev\Logger\Interface;

interface WriterInterface
{
    public function error(string $message): void;

    public function warning(string $message): void;
}