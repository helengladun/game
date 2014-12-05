<?php
include_once('CharacterClass.php');
class Monster extends Character
{
	public function __construct()
	{
		$this->name = 'Monster';
	}

	public function setHealth()
	{	
		parent::setHealth(500, 100);
	}

	public function setAttackDamage()
	{	
		parent::setAttackDamage(30, 2.3);
	}	
}