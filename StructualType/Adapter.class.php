<?php
/**
 * 适配器模式
 * User: jianjian3
 * Date: 2019/3/27
 * Time: 17:22
 */
class Adaptee
{
    public function realRequest(){
        echo '这是被是适配者真正调用的方法';
    }
}

interface Target
{
    public function request();
}

class Adapter implements Target
{
    protected $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        // TODO: Implement request() method.
        echo '适配器转换：';
        $this->adaptee->realRequest();
    }
}

$adaptee = new Adaptee();
$target = new Adapter($adaptee);
$target->request();
