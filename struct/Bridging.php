<?php
/**
 * 桥接模式
 * User: jianjian3
 * Date: 2019/3/27
 * Time: 18:57
 */
interface DrawingAPI
{
    public function draw($x,$y,$radius);
}

class DrawingAPI1 implements DrawingAPI
{
    public function draw($x, $y, $radius)
    {
        // TODO: Implement draw() method.
        $this->drawCircle($x,$y,$radius);
    }

    private function drawCircle($x,$y,$radius){
        echo "API1.circle at (".$x.','.$y.') radius '.$radius.'<br>';
    }
}

class DrawingAPI2 implements DrawingAPI
{
    public function draw($x, $y, $radius)
    {
        // TODO: Implement draw() method.
        $this->drawCircle($x,$y,$radius);
    }

    private function drawCircle($x,$y,$radius){
        echo "API1.circle at (".$x.','.$y.') radius '.$radius.'<br>';
    }
}

interface shape
{
    public function draw();
    public function resize($radius);
}

class CircleShape implements shape
{
    protected $x;
    protected $y;
    protected $radius;
    protected $drawingAPI;

    public function __construct($x,$y,$radius,DrawingAPI $drawingAPI)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
        $this->drawingAPI = $drawingAPI;
    }

    public function draw()
    {
        // TODO: Implement draw() method.
        $this->drawingAPI->draw($this->x,$this->y,$this->radius);
    }

    public function resize($radius)
    {
        // TODO: Implement resize() method.
        $this->radius = $radius;
    }
}
$shape1 = new CircleShape(1,2,4,new DrawingAPI1());
$shape2 = new CircleShape(1,2,4,new DrawingAPI2());
$shape1->draw();
$shape2->draw();
$shape1->resize(10);
$shape1->draw();