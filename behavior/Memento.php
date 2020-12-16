<?php
/**
 * 备忘录
 */
class Memento {
    private $state;

    public function __construct($state) {
        $this->state = $state;
    }

    public function getState(){
        return $this->state;
    }
}

class  Originator {
    private $state;

    public function setState($state){
        $this->state = $state;
    }

    public function getState(){
        return $this->state;
    }

    public function saveStateToMemento() {
        return new Memento($this->state);
    }

    public function getStateFromMemento($memento){
        $this->state = $memento->getState();
    }
}

class CareTaker {
    private $memento = [];

    public function add($memento) {
        array_push($this->memento, $memento);
    }

    public function get($index){
        return $this->memento[$index];
    }
}

$originator = new originator();
$careTaker = new CareTaker();
$originator->setState("State 1");
$originator->setState("State 2");
$careTaker->add($originator->saveStateToMemento());
$originator->setState("State 3");
$careTaker->add($originator->saveStateToMemento());
$originator->setState("State 4");

var_dump("Current State: " . $originator->getState());    
$originator->getStateFromMemento($careTaker->get(0));
var_dump("First saved State: " . $originator->getState());
$originator->getStateFromMemento($careTaker->get(1));
var_dump("Second saved State: " . $originator->getState());