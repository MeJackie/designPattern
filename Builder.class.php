<?php
/**
 * 建造者模式
 * User: jianjian3
 * Date: 2019/3/27
 * Time: 16:27
 */


abstract class Builder
{
    protected $car;
    abstract public function buildPartA();
    abstract public function buildPartB();
    abstract public function buildPartC();
    abstract public function getResult();
}

class CarBuilder extends Builder
{
    function __construct()
    {
        $this->car = new Car();
    }

    public function buildPartA()
    {
        // TODO: Implement buildPartA() method.
        $this->car->setPartA('发动机');
    }

    public function buildPartB()
    {
        // TODO: Implement buildPartB() method.
        $this->car->setPartB('轮子');
    }

    public function buildPartC()
    {
        // TODO: Implement buildPartC() method.
        $this->car->setPartC('其他部分');
    }

    public function getResult()
    {
        // TODO: Implement getResult() method.
        return $this->car;
    }

    public function getCar(){
        return $this->car;
    }
}

class Car
{
    protected $partA;
    protected $partB;
    protected $partC;

    public function setPartA($str){
        $this->partA = $str;
    }

    public function setPartB($str){
        $this->partB = $str;
    }

    public function setPartC($str){
        $this->partC = $str;
    }

    public function show(){
        echo "这辆车由：".$this->partA.','.$this->partB.',和'.$this->partC.'组成';
    }
}

class Director
{
    protected $myBuilder;

    public function setBuilder(Builder $builder){
        $this->myBuilder = $builder;
    }

    public function startBuild(){
        $this->myBuilder->buildPartA();
        $this->myBuilder->buildPartB();
        $this->myBuilder->buildPartC();
        return $this->myBuilder->getResult();
    }
}

$carbuilder = new CarBuilder();
$director = new Director();
$director->setBuilder($carbuilder);
$newcar = $director->startBuild();
$newcar->show();
