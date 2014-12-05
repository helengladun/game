<?php
include_once('FightClass.php');
class FightException extends Exception {};
class Fight 
{
	public $hero;

	public function __construct($hero)
	{
		$this->hero = $hero;
	}

	public function takeHero()
	{
		switch ($this->hero) {
		case 'Olaf':
			include_once ('OlafClass.php');
			return new Olaf();
			break;
		case 'Malphite':
			include_once ('MalphiteClass.php');
			return new Malphite();
			break;
		default:
			throw new FightException ("Sorry, you try to use character, which class hasn't been finished yet. Please, choose another fighter");
			break;
		}
	}

	public function takeMonster()
	{
		include_once ('MonsterClass.php');
		return new Monster;
	}

	public function params($method, $fighter, $params)
	{	
		if ($method != 'set' && $method != 'get') {
			throw new FightException ("Undefined method");	
		}
		if (is_object($fighter)) {
			$getParams = array();
			 if (is_array($params) && count($params) > 0) {
				foreach($params as $function)
				{
					$methodToDo = $method.$function;
					if (method_exists($fighter, $methodToDo)) {
						if ($method == 'set') {
							$fighter->$methodToDo();
				 		} elseif ($method == 'get') {
				 			$getParams["$methodToDo"] = $fighter->$methodToDo();
				 		} 
			 		} else {
			 			throw new FightException ("Undefined parameters");
			 		} 
			 	}
			 	return $getParams;
			 }
			 else {
				throw new FightException ("Third parameter must be an array");
			}	
		} else {
			throw new FightException ("Not object given");
		}
	}	

	public function attack($fighter1, $fighter2)
	{
		$fightMethod = $fighter1->fighter();
		$protectMethod = $fighter2->protection();
		echo "{$fighter1->giveName()} hited into $fightMethod. {$fighter2->giveName()}  protected $protectMethod. <br/>";
		if ($fightMethod == $protectMethod) {
			return true;
		} else {
			return false;
		}
	}
	
	public function recalcHealth($result, $health, $damage)
	{
		if ($result == true) {
			return $health-$damage/2;
		} else {
			return $health-$damage;
		}
	}


}