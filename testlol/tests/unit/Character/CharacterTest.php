<?php
class CharacterTest extends  PHPUnit_Framework_TestCase
{

	public function testGetLevel()
	{
		$obj = new Character('Olaf', 'monster');
		$obj->setLevel(2);
		$level = $obj->getLevel();
		$this->assertEquals($obj->getLevel(), 2);
		return $level;
	}

    /**
     * @depends testGetLevel
     */
	public function testGetHealth($level)
	{
		$obj = new Character('test', 'test');
		$obj->setLevel($level);
		$obj->setHealth(200, 60);
		$this->assertEquals($obj->getHealth(), 260);
	}

    /**
     * @dataProvider provider
     */
    public function testGetAttackDamage($a, $b, $c, $level)
	{
		$obj = new Character('test', 'test');
		$obj->setLevel($level);
		$obj->setAttackDamage($a, $b);
		$this->assertEquals($obj->getAttackDamage(), $c);
	}

    /**
     * @dataProvider provider
     */
	public function testGetHealthRegen($a, $b, $c, $level)
	{
		$obj = new Character('test', 'test');
		$obj->setLevel($level);
		$obj->setHealthRegen($a, $b);
		$this->assertEquals($obj->getHealthRegen(), $c);
	}

    /**
     * @dataProvider provider
     */
	public function testGetMana($a, $b, $c, $level)
	{
		$obj = new Character('test', 'test');
		$obj->setLevel($level);
		$obj->setMana($a, $b);
		$this->assertEquals($obj->getMana(), $c);
	}

	/**
     * @dataProvider provider
     */
	public function testGetManaRegen($a, $b, $c, $level)
	{
		$obj = new Character('test', 'test');
		$obj->setLevel($level);
		$obj->setManaRegen($a, $b);
		$this->assertEquals($obj->getManaRegen(), $c);
	}

	/**
     * @dataProvider provider
     */
	public function testGetMagicResist($a, $b, $c, $level)
	{
		$obj = new Character('test', 'test');
		$obj->setLevel($level);
		$obj->setMagicResist($a, $b);
		$this->assertEquals($obj->getMagicResist(), $c);
	}

	public function testGetMovementSpeed()
	{
		$obj = new Character('test', 'test');
		$obj->setMovementSpeed(335);
		$this->assertEquals($obj->getMovementSpeed(), 335);
	}

    public function testGiveName() {
		$obj = new Character('Olaf', 'monster');
		$this->assertEquals($obj->giveName(), 'Olaf');
    }

    public function testGiveRole() {
    	$obj = new Character('Malphite', 'tank');
    	$this->assertEquals($obj->giveRole(), 'tank');
    }
 
    public function testProtection() 
	{
		$obj = new Character('Malphite', 'tank');
		$this->assertContains($obj->protection(), array('Head', 'Body', 'Legs'));
	}

	public function testFighter()
	{
		$obj = new Character('Malphite', 'tank');
		$this->assertContains($obj->fighter(), array('Head', 'Body', 'Legs'));
	}

	public function provider()
    {
        return array(
	        array(10, 3.5, 17, 3),
	        array(20, 2, 20, -2),
			array(20, 2, 54, 19),
			array(20, 2, 20, 0)
        );
    }

}