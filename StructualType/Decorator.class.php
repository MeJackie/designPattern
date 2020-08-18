<?php
/**
 * 装饰模式（修饰模式）
 * User: jianjian3
 * Date: 2019/3/27
 * Time: 19:22
 */

abstract class Component
{
    abstract public function operation();
}

class MyComponent extends Component
{
    public function operation()
    {
        // TODO: Implement operation() method.
        echo '这是本来组件的方法<br>';
    }
}

abstract class Decorator extends Component
{
    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        // TODO: Implement operation() method.
        $this->component->operation();
    }
}

class MyDecorator extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function myOperation(){
        echo "这是装饰器添加的方法<br>";
    }
}

$component = new MyComponent();
$de = new MyDecorator($component);
$de->operation();
$de->myOperation();