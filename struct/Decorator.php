<?php
/**
 * 装饰器模式
 */

 interface DataSource {
     public function writeData($data);
     public function readData();
 }

 class FileSource implements DataSource {

    public function __construct($filename){

    }

     public function writeData($data){
         var_dump('写入');
     }

     public function readData(){

     }
 }

 abstract class DataSourceDecorator implements DataSource {

    protected $dataSource;

    public function __construct($dataSource) {
        var_dump('装饰器基类初始化');
        $this->dataSource = $dataSource;
    }

    abstract public function writeData($data);

    abstract public function readData();
 }

 // 加密适配器
 class EncryptionDecorator extends DataSourceDecorator {

    public function writeData($data){
        var_dump('加密');
        $this->dataSource->writeData($data);
    }

    public function readData(){

    }
 }

 // 压缩适配器
 class CompressionDecorator extends DataSourceDecorator {
    public function writeData($data){
        var_dump('压缩');
        $this->dataSource->writeData($data);
    }

    public function readData(){

    }
 }

 $testData = 'ssss';
 $source = new FileSource('test.txt');
 $source->writeData($testData);

 $source = new EncryptionDecorator($source);

 $source->writeData($testData);

