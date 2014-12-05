<?php
include_once('FightClass.php');
//error_reporting(0);
session_start();
$name = $_SESSION['char'];
if ($_SESSION['char'] != null) {
	$usersCharacter = $_SESSION['char'];
	if (in_array($usersCharacter, array('Olaf', 'Malphite'))) {
		$fight = new Fight($usersCharacter);
		$character = $fight->takeHero();
		if (isset($character)) {
			$monster = $fight->takeMonster();
			if (!isset($_SESSION['level'])) {
				$_SESSION['level'] = 1; // FROM DB
				$_SESSION['xp'] = 0; //FROM DB
			}
			$character->setLevel($_SESSION['level']);
			$monster->setLevel($_SESSION['level']);
			$paramsForSetting = array('Health', 'AttackDamage');
			$fight->params('set', $character, $paramsForSetting);
			$fight->params('set', $monster, $paramsForSetting);
			$monsterArray = $fight->params('get', $monster, $paramsForSetting);
			$characterArray = $fight->params('get', $character, $paramsForSetting);
			while ($characterArray['getHealth']>0 && $monsterArray['getHealth']>0) {
				$hit = $fight->attack($character, $monster);
				$monsterArray['getHealth'] = $fight->recalcHealth($hit, $monsterArray['getHealth'], $characterArray['getAttackDamage']);
				echo "{$character->giveName()}'s health = {$characterArray['getHealth']}. {$monster->giveName()}'s health = {$monsterArray['getHealth']}. <br/>";
				if ($monsterArray['getHealth']>0) {
					$riposte = $fight->attack($monster, $character);
					$characterArray['getHealth'] = $fight->recalcHealth($riposte, $characterArray['getHealth'], $monsterArray['getAttackDamage']);
					echo "{$character->giveName()}'s health = {$characterArray['getHealth']}. {$monster->giveName()}'s health = {$monsterArray['getHealth']}. <br/>";
					if ($characterArray['getHealth']<=0) {
						echo "Monster wins! <br/>";
						break;
					}
				}  
				else {
					unset($monster);
					$_SESSION['xp'] = $_SESSION['xp'] + 10*$_SESSION['level'];
					$level = intval($_SESSION['xp']/1000);
					echo "Monster died. You win! <br/>Your experience - {$_SESSION['xp']}.<br/>";
					if ($level>=1 && $level <=18 && $level != $_SESSION['level']) {
						$_SESSION['level'] = $level;
						echo "Level up! <br/>";
					}
				}
			}
		}
	} else {
		echo "Sorry, you try to use character, which class hasn't been finished yet. Please, choose another fighter";
	}
} 


