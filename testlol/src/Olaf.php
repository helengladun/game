<?php
class Olaf extends Character
{
	public function __construct()
	{
		parent::__construct('Olaf', 'fighter');
	}

	public function setHealth($health = 300, $coef = 91)
	{	
		parent::setHealth($health, $coef);
	}

	public function setHealthRegen($healthRegen = 7, $coef = 0.9)
	{	
		parent::setHealthRegen($healthRegen, $coef);
	}

	public function setMana($mana = 190, $coef = 45)
	{	
		parent::setMana($mana, $coef);
	}

	public function setManaRegen($manaRegen = 6.5, $coef = 0.575)
	{	
		parent::setManaRegen($manaRegen, $coef);
	}	

	public function setAttackDamage($attackDamage = 54.1, $coef = 3.5)
	{	
		parent::setAttackDamage($attackDamage, $coef);
	}	
	
	public function setArmor($armor = 21, $coef = 3)
	{	
		parent::setArmor($armor, $coef);
	}	

	public function setAttackSpeed($attackSpeed = 0.694, $coef = 0.027)
	{	
		parent::setAttackSpeed($attackSpeed, $coef);
	}	

	public function setMagicResist($magicResist = 30, $coef = 1.25)
	{	
		parent::setMagicResist($magicResist, $coef);
	}	

	public function setMovementSpeed($movementSpeed = 350)
	{	
		parent::setMovementSpeed($movementSpeed);
	}	
}