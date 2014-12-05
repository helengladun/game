<?php
class Monster extends Character
{
	public function __construct()
	{
		parent::__construct('Monster', 'monster');
	}

	public function setHealth($health = 500, $coef = 100)
	{	
		parent::setHealth($health, $coef);
	}

	public function setAttackDamage($attackDamage = 30, $coef = 2.3)
	{	
		parent::setAttackDamage($attackDamage, $coef);
	}	
}