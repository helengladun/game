<?php
class Malphite extends Character
{
	public function __construct()
	{
		parent::__construct('Malphite', 'tank');
	}

	public function setHealth($health = 423, $coef = 90)
	{	
		parent::setHealth($health, $coef);
	}

	public function setHealthRegen($healthRegen = 7.45, $coef = 0.55)
	{	
		parent::setHealthRegen($healthRegen, $coef);
	}

	public function setMana($mana = 215, $coef = 40)
	{	
		parent::setMana($mana, $coef);
	}

	public function setManaRegen($manaRegen = 6.4, $coef = 0.55)
	{	
		parent::setManaRegen($manaRegen, $coef);
	}	

	public function setAttackDamage($attackDamage = 56.3, $coef = 3.375)
	{	
		parent::setAttackDamage($attackDamage, $coef);
	}	

	public function setArmor($armor = 22, $coef = 3.75)
	{	
		parent::setArmor($armor, $coef);
	}	

	public function setAttackSpeed($attackSpeed = 0.638, $coef = 0.034)
	{	
		parent::setAttackSpeed($attackSpeed, $coef);
	}	

	public function setMagicResist($magicResist = 30, $coef = 1.25)
	{	
		parent::setMagicResist($magicResist, $coef);
	}

	public function setMovementSpeed($movementSpeed = 335)
	{	
		parent::setMovementSpeed($movementSpeed);
	}	
}
