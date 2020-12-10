<?php
/**
 *  汉堡快餐店
 */ 

// 食物
interface Item {
    public function name();
    public function packing();
    public function price();
}

// 包装
interface Packing {
    public function pack();
}

// 纸盒
class Wrapper implements Packing {
    public function pack(){
        return 'wrapper';
    }
}

//杯子
class Bottle implements Packing {
    public function pack(){
        return ('bottle');
    }
}

// 汉堡
abstract class Burger implements Item {
    public function packing(){
        return new Wrapper();
    }

    abstract public function price();
}

//凉饮
abstract class ColdDrink implements Item {
    public function packing() {
        return new Bottle();
    }

    abstract public function price();
}

// 蔬菜汉堡
class VegBurger extends Burger {
    public function name() {
        return ('Veg Burger');
    }

    public function price() {
        return 2;
    }
}

// 鸡肉汉堡
class ChickenBurger extends Burger {
    public function name() {
        return ('Chicken Burger');
    }

    public function price() {
        return 4;
    }
}

//可口可乐
class CocaColaCoke extends ColdDrink {
    public function name() {
        return ('CocaColaCoke');
    }

    public function price() {
        return 1;
    }
}

//百事可乐
class PepsiCoke extends ColdDrink {
    public function name() {
        return ('PepsiCoke');
    }

    public function price() {
        return 2;
    }
}

//餐点
class Meal {
    private $Items;

    // 添加食品饮料
    public function addItem($item){
        $this->Items[] = $item;
    }

    public function getCost(){
        $allCost = 0;
        foreach($this->Items as $item){
            $allCost += (float)$item->price();
        }

        return $allCost;
    }

    public function showItem(){
        foreach($this->Items as $item){
            var_dump("name : ".$item->name());
            var_dump("price : ".$item->price());
            var_dump("pack : ".$item->packing()->pack());
        }
    }
}

//餐点构造类
class MealBuilder {
    public function prepareVegMeal(){
        $meal = new Meal();
        $meal->addItem(new VegBurger);
        $meal->addItem(new CocaColaCoke);
        return $meal;
    }

    public function prepareNoVegMeal(){
        $meal = new Meal();
        $meal->addItem(new ChickenBurger);
        $meal->addItem(new PepsiCoke);
        return $meal;
    }
}

$vegMeal = (new MealBuilder)->prepareVegMeal();
$vegMeal->showItem();
var_dump("vegMeal Cost : ".$vegMeal->getCost());