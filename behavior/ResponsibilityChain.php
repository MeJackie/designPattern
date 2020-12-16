<?php
/**
 * 责任连模式，日志
 */
abstract class AbstractLogger{
    public static $info = 1;
    public static $debug = 2;
    public static $error = 3;

    protected $level;

    // 责任链下一个日志处理器
    protected $nexLogger; 

    public function setNextLogger($nextLogger) {
        $this->nextLogger = $nextLogger;
    }

    public function logMessage($level, $message){
        if($level >= $this->level){
            $this->write($message);
        }
        if(!empty($this->nextLogger)){
            $this->nextLogger->logMessage($level, $message);
        }
    }

    abstract public function write($message);
}

class ConsoleLogger extends AbstractLogger {

    public function __construct($level){
        $this->level = $level;
    }

    public function write($message){
        var_dump('Console write :'.$message);
    }
}

class FileLogger extends AbstractLogger {

    public function __construct($level){
        $this->level = $level;
    }

    public function write($message){
        var_dump('File write :'.$message);
    }
}

class ErrorLogger extends AbstractLogger {

    public function __construct($level){
        $this->level = $level;
    }

    public function write($message){
        var_dump('Error write :'.$message);
    }
}

class Chain{
    public function getChainOfLogger()
    {
        $errorLogger = new ErrorLogger(AbstractLogger::$error);
        $fileLogger = new FileLogger(AbstractLogger::$debug);
        $consoleLogger = new ConsoleLogger(AbstractLogger::$info);
        
        $errorLogger->setNextLogger($fileLogger);
        $fileLogger->setNextLogger($consoleLogger);
        
        return $errorLogger;
    }
}

$chain = (new Chain())->getChainOfLogger();
var_dump($chain);exit;
$chain->logMessage(AbstractLogger::$info, 'info');
$chain->logMessage(AbstractLogger::$debug, 'debug');
$chain->logMessage(AbstractLogger::$error, 'error');






