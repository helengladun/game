<?php
class FightTest extends PHPUnit_Framework_TestCase
{

	/**
    * @dataProvider provider
    */
	public function testTakeHero($name, $class, $file)
	{
		$obj = new Fight($name);
		$hero = $obj->takeHero();
		$this->assertInstanceOf($class, $hero);
		$this->assertFileExists($file);
	}

	public function testTakeMonster()
	{
		$name = 'Monster';
		$obj = new Fight('Olaf');
		$hero = $obj->takeMonster();
		$this->assertInstanceOf($name, $hero);
		$this->assertFileExists('../src/'.$name.'.php');
	}

	public function provider()
	{
	    return array(
	        array('Olaf', 'Olaf', '../src/Olaf.php'),
	       	array('Malphite', 'Malphite', '../src/Malphite.php')
	    );
	}

	public function testParams()
	{
		$obj = new Fight ('Olaf');
		$fighter = $obj->takeHero();
		$params = array('Health', 'ManaRegen');
		$obj->params('set', $fighter, $params);
		$this->assertCount(2, $obj->params('get', $fighter, $params));
	}

	public function testAttack()
	{
		$obj = new Fight ('Olaf');
		$fighter1 = $obj->takeHero();
		$fighter2 = $obj->takeMonster();
		$attack = $obj->attack($fighter1, $fighter2); 
		if ($attack) {
			$this->assertTrue($attack); 
		} elseif ($attack == false) {
			$this->assertFalse($attack);
		}
	}

	public function testAttackWithMock()
	{
		$hero1 = $this->getMock('Olaf');
		$hero1->expects($this->any())
		 		->method('fighter')
             	->will($this->returnValue('Head'));
        $hero2 = $this->getMock('Monster');
		$hero2->expects($this->any())
		 		->method('protection')
             	->will($this->returnValue('Head'));
		$obj = new Fight ($hero1);
		$attack = $obj->attack($hero1, $hero2); 
		$this->assertTrue($attack);
	}

	public function testAttackWithRecursiveMock()
	{
		$hero1 = $this->getMock('Olaf');
		$hero1->expects($this->any())
		 		->method('fighter')
             	->will($this->onConsecutiveCalls('Legs', 'Head', 'Body'));
        $hero2 = $this->getMock('Monster');
		$hero2->expects($this->any())
		 		->method('protection')
             	->will($this->returnValue('Head'));
       	$obj = new Fight ('Olaf');  	
        $this->assertFalse($obj->attack($hero1, $hero2));
        $this->assertTrue($obj->attack($hero1, $hero2));
        $this->assertFalse($obj->attack($hero1, $hero2));
        $this->expectOutputString(" hited into Legs.   protected Head. <br/> hited into Head.   protected Head. <br/> hited into Body.   protected Head. <br/>");
	}

    public function testRecalcHealth() 
    {
    	$obj = new Fight ('Olaf');
    	$this->assertEquals($obj->recalcHealth(true, 100, 50), 75);
    	$this->assertEquals($obj->recalcHealth(false, 100, 50), 50);
    }
}