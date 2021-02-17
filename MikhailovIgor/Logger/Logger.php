<?php
namespace MikhailovIgor\Logger;

class Logger
{
    private $pathToLogFile;
    private $logLevelsList = ["TRACE", "DEBUG", "INFO", "WARN", "ERROR", "FATAL"];
    private $defaulLogLevel = "INFO";

    public function __construct(String $pathToLogFile){
        $this->pathToLogFile = $pathToLogFile;
    }

    public function createLog(String $textLog, String $logLevel = "INFO")
    {
        $timeNow = date("d-m-Y H:m:s");
        $file = fopen($this->pathToLogFile, "a+");
        $actualLoglevel = $this->defaulLogLevel;
        foreach ($this->logLevelsList as $logLevelFromList) {
            if ($logLevelFromList == $logLevel) {
                $actualLoglevel = $logLevel;
                break;
            }
        }
        fwrite($file, $actualLoglevel . " >>> " . $timeNow . " >>> " . $textLog . "\n");
        fclose($file);
    }
}
