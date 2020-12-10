<?php
/**
 *  抽象工厂
 */
 
interface Shape1 {
    public function draw();
}

class Circle implements Shape1 {
    public function draw(){
        echo 'circle'."\n";
    }
}

class Square implements Shape1 {
    public function draw(){
        echo 'square'."\n";
    }
}

interface Color {
    public function fill();
}

class Red implements Color {
    public function fill(){
        var_dump('red');
    }
}

class Green implements Color {
    public function fill(){
        var_dump('green');
    }
}
 
abstract class AbstractFactory {
    abstract public function getShape($shape);
    abstract public function getColor($color);
}

class ShapeFactory extends AbstractFactory {
    public function getShape($shape){
        if($shape == 'CIRCLE'){
            return new Circle();
        } elseif($shape = 'SQUARE') {
            return new Square();
        }
    }

    public function getColor($color){
        return null;
    }
}

class ColorFactory extends AbstractFactory {
    public function getShape($shape){
        return null;
    }

    public function getColor($color){
        if($color == 'RED'){
            return new Red();
        } elseif($color = 'GREEN') {
            return new Green();
        }
    }
}

class FactoryProducter {
    public function getFactory($factory){
        if($factory == 'SHAPE'){
            return new ShapeFactory();
        } elseif($factory = 'COLOR') {
            return new ColorFactory();
        }
    }
}

(new FactoryProducter)->getFactory("SHAPE")->getShape("CIRCLE")->draw();