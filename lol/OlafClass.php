<?php
include_once('CharacterClass.php');

class Olaf extends Character
{
	public function __construct()
	{
		parent::__construct('Olaf', 'fighter');
	}

	public function setHealth()
	{	
		parent::setHealth(300, 91);
	}

	public function setHealthRegen()
	{	
		parent::setHealthRegen(7, 0.9);
	}

	public function setMana()
	{	
		parent::setMana(190, 45);
	}

	public function setManaRegen()
	{	
		parent::setManaRegen(6.5, 0.575);
	}	

	public function setAttackDamage()
	{	
		parent::setAttackDamage(54.1, 3.5);
	}	
	
	public function setArmor()
	{	
		parent::setArmor(21, 3);
	}	

	public function setAttackSpeed()
	{	
		parent::setAttackSpeed(0.694, 0.027);
	}	

	public function setMagicResist()
	{	
		parent::setMagicResist(30, 1.25);
	}	

	public function setMovementSpeed()
	{	
		parent::setMovementSpeed(350);
	}	
}