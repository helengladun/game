<?php
include_once('CharacterClass.php');

class Malphite extends Character
{
	public function __construct()
		{
			parent::__construct('Malphite', 'tank');
		}

	public function setHealth()
	{	
		parent::setHealth(423, 90);
	}

	public function setHealthRegen()
	{	
		parent::setHealthRegen(7.45, 0.55);
	}

	public function setMana()
	{	
		parent::setMana(215, 40);
	}

	public function setManaRegen()
	{	
		parent::setManaRegen(6.4, 0.55);
	}	

	public function setAttackDamage()
	{	
		parent::setAttackDamage(56.3, 3.375);
	}	
	
	public function setArmor()
	{	
		parent::setArmor(22, 3.75);
	}	

	public function setAttackSpeed()
	{	
		parent::setAttackSpeed(0.638, 0.034);
	}	

	public function setMagicResist()
	{	
		parent::setMagicResist(30, 1.25);
	}	

	public function setMovementSpeed()
	{	
		parent::setMovementSpeed(335);
	}	
}
