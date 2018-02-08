<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 07/02/2018
 * Time: 10:43
 */
class FileLogWriter implements Persistable
{
    /**
     * @var string
     */
    private $logPath;

    /**
     * FileLogWriter constructor.
     * @param $logPath
     */
    public function __construct(string $logPath)  // Le typage n'est pas obligatoire mais si utilisé devient obligatoire
    {
        $this->logPath = $logPath;
    }

    /**
     * @param string $message
     */
    public function persist(string $message)
    {
        $now=new DateTime();
        $logContent= $now->format("Y-m-d H:i:s")."\t$message\n";
        file_put_contents($this->logPath,$logContent, FILE_APPEND);
    }
}