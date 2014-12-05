<?php
class FightExceptionTest extends PHPUnit_Framework_TestCase
{
     /**
     * @expectedException FightException
     * @expectedExceptionMessage Sorry, you try to use character, which class hasn't been finished yet. Please, choose another fighter
     */
    public function testExceptionToHero()
    {
        $myObj = new Fight('Varus');
        $myObj->takeHero();
    }

     /**
     * @expectedExceptionMessage Undefined method
     */
    public function testExceptionToMethod()
    {
     	$this->setExpectedException('FightException');
        $myObj = new Fight('Olaf');
        $fighter = $myObj->takeHero();
        $params = array('Health', 'AttackDamage');
        $myObj->params('take', $fighter, $params);
    }

    public function testExceptionToObject()
    {
     	try {   
	        $myObj = new Fight('Olaf');
	        $fighter = 2;
	        $params = array('Health', 'AttackDamage');
	        $myObj->params('set', $fighter, $params);
        } catch (FightException $e) {
    		return;
    	}	
    	$this->fail('An expected exception has not been raised.');
    }

    public function testExceptionMessageToObject()
    {
     	try {
	        $myObj = new Fight('Olaf');
	        $fighter = 2;
	        $params = array('Health', 'AttackDamage');
	        $myObj->params('set', $fighter, $params);
    	} catch (FightException $e) {
    		$mess = $e->getMessage();
    	} 
    	$this->assertContains('Not object given', $mess);
    }

     /**
     * @expectedException FightException
     * @expectedExceptionMessage Third parameter must be an array
     */
    public function testExceptionToArray()
    {
     	$this->setExpectedException('FightException');
        $myObj = new Fight('Olaf');
        $fighter = $myObj->takeHero();
        $params ='Health';
        $myObj->params('get', $fighter, $params);
    }

    public function testExceptionToParams()
    {
     	try {        
	     	$myObj = new Fight('Olaf');
	        $fighter = $myObj->takeHero();
	        $params = array('Health', 'AttackDamage');
	        $myObj->params('take', $fighter, $params);
    	} catch (FightException $e) {
    		return;
    	}	
    	$this->fail('An expected exception has not been raised.');
    }

     public function testExceptionMessageToParams()
    {
     	try {
        $myObj = new Fight('Olaf');
        $fighter = $myObj->takeHero();
        $params = array('Magic', 'AttackDamage');
        $myObj->params('set', $fighter, $params);
    	} catch (FightException $e) {
    		$mess = $e->getMessage();
    	} 
    	$this->assertContains('Undefined parameters', $mess);
    }

}