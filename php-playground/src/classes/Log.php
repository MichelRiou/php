<?php

class Log
{
    private $logWriter;

    /**
     * Log constructor.
     * @param $logWriter
     */
    public function __construct(Persistable $logWriter)
    {
        $this->logWriter = $logWriter;
    }

    public function write($message)
    {
        $this->logWriter->persist($message);
    }
}