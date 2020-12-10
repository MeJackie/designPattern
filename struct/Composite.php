<?php
/**
 * 组合模式，几何图形编辑器
 */
interface Graphic {
    public function move($x, $y);
    public function draw();
}

class Dot implements Graphic {
    private $x, $y;

    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }

    public function move($x, $y) {

    }

    public function draw() {

    }
}

class Circle extends Dot {
    private $radius; //半径

    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }

    public function draw() {

    }
}

class CompoundGraphic implements Graphic {
    private $graphics;

    public function add(Graphic $graphic){
        $this->graphics[] = $graphic;
    }

    public function remove(Graphic $graphic){

    }

    public function move($x, $y) {

    }

    public function draw() {
        
    }
}