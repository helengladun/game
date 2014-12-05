<?php 
class CharException extends Exception {};
class Character 
{
	public $level;
	public $xp;
	public $name;
	public $role;
	public $health;
	public $healthRegen;
	public $mana;
	public $manaRegen;
	public $attackDamage;
	public $armor;
	public $attackSpeed;
	public $magicResist;
	public $movementSpeed;
	public $abilities = array();

	public function __construct($name, $role)
	{
		$this->name = $name;
		$this->role = $role;
	}

	public function giveName()
	{
		return $this->name;
	}

	public function giveRole()
	{
		return $this->role;
	}

	public function getLevel()
	{
		return $this->level;
	}

	public  function getHealth()
	{	
		return $this->health;
	}

	public function getHealthRegen()
	{	
		return $this->healthRegen;
	}

	public function getMana()
	{	
		return $this->mana;
	}

	public function getManaRegen()
	{	
		return $this->manaRegen;
	}

	public function getAttackDamage()
	{	
		return $this->attackDamage;
	}

	public function getArmor()
	{	
		return $this->armor;
	}
	
	public function getAttackSpeed()
	{	
		return $this->attackSpeed;
	}

	public function getMagicResist()
	{	
		return $this->magicResist;
	}

	public function getMovementSpeed()
	{	
		return $this->movementSpeed;
	}

	public function getAbilities() 
	{
		return $this->abilities;
	} 
	
	public function setHealth($health, $coef)
	{	
		$this->health = $health + ($this->level-1)*$coef;
	}

	public function setHealthRegen($healthRegen, $coef)
	{	
		$this->healthRegen = $healthRegen + ($this->level-1)*$coef;
	}

	public function setMana($mana, $coef)
	{	
		$this->mana = $mana + ($this->level-1)*$coef;
	}

	public function setManaRegen($manaRegen, $coef)
	{	
		$this->manaRegen = $manaRegen + ($this->level-1)*$coef;
	}

	public function setAttackDamage($attackDamage, $coef)
	{	
		$this->attackDamage = $attackDamage + ($this->level-1)*$coef;
	}

	public function setArmor($armor, $coef)
	{	
		$this->armor = $armor + ($this->level-1)*$coef;
	}
	
	public function setAttackSpeed($attackSpeed, $coef)
	{	
		$this->attackSpeed = $attackSpeed + ($this->level-1)*$coef;
	}

	public function setMagicResist($magicResist, $coef)
	{	
		$this->magicResist = $magicResist + ($this->level-1)*$coef;
	}

	public function setMovementSpeed($movementSpeed)
	{	
		$this->movementSpeed = $movementSpeed;
	}

	public function setAbilities($abilities) 
	{	
		if (is_array($abilities)) {
			$this->abilities = $abilities;
		} else {
			throw new CharException ("Given parameter must be an array");
		}
	} 

	public function setLevel($level)
	{
		if ($level >=1 && $level <=18) {
				$this->level = $level;
		}
		elseif ($level > 18) {
			$this->level = 18;
		} else {
			$this->level = 1;
		}
	}

	public function protection() 
	{
		$defend = array('Head', 'Body', 'Legs');
		$key = array_rand($defend);
		return $defend[$key];
	}

	public function fighter() 
	{
		$attack = array('Head', 'Body', 'Legs');
		$key = array_rand($attack);
		return $attack[$key];
	}
} 