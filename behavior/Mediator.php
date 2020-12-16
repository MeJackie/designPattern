<?php
/**
 * 中介者模式
 */

 class ChatRoom {
     public static function showMessage($user, $message){
         var_dump(date('Y-m-d H:i:s ').$user->getName()." send :".$message);
     }
 }

 class User {

    public $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function sendMessage($message){
        ChatRoom::showMessage($this, $message);
    }
 }

 $john = new User('john');
 $jackie = new User('jackie');

 $john->sendMessage('hi');
 $jackie->sendMessage('hello');