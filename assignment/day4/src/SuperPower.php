<?php
class SuperPower {
    public function fly() {
      return "I can fly.";
    }
  
    public function laserEye() {
      return "I have laser eyes.";
    }
  }
  
  class IronMan extends SuperPower {
    public function repulsorBlast() {
      return "I can shoot repulsor blasts.";
    }
  }
  
  class CaptainAmerica extends SuperPower {
    public function shieldThrow() {
      return "I can throw my shield.";
    }
  }
  
  class Thor extends SuperPower {
    public function lightningBolt() {
      return "I can summon lightning bolts.";
    }
  }