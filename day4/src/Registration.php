<?php
class Registration{
    public function __construct($fastname,$lastname)
    {
        echo 'My name is '.$fastname.' '.$lastname."<br>";
    }

    public function __destruct()
    {
        echo 'I am destroyed';
    }
}