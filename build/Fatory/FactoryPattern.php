<?php
/**
 * 工厂模式
 * User: jianjian3
 * Date: 2019/3/19
 * Time: 16:14
 */

interface Shape1 {
    public function draw();
}

class Circle implements Shape1 {
    public function draw(){
        echo 'circle';
    }
}

class Square implements Shape1 {
    public function draw(){
        echo 'square';
    }
}

class ShapeFactory {
    public function getShape($type){
        if($type == 'CIRCLE'){
            return new Circle();
        } elseif($type = 'SQUARE') {
            return new Square();
        }
    }
}

(new ShapeFactory)->getShape('CIRCLE')->draw();