<?php
/**
 * 组合模式，几何图形编辑器
 * 组合图形CompoundGraphic 是一个容器，它可以由多个包括容器在内的子图形构成。
 * 组合图形与简单图形拥有相同的方法。但是，组合图形自身并不完成具体工作，
 * 而是将请求递归地传递给自己的子项目，然后“汇总”结果。
 * 
 * 通过所有图形类所共有的接口，客户端代码可以与所有图形
 * 互动。因此，客户端不知道与其交互的是简单图形还是组合
 * 图形。客户端可以与非常复杂的对象结构进行交互，而无需
 * 与组成该结构的实体类紧密耦合。
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
        foreach($this->graphics as $graphic){
            $graphic->draw();
        }
    }
}