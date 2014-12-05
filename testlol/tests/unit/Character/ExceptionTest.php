<?php 
class CharExceptionTest extends PHPUnit_Framework_TestCase 
{
    /** 
     * @expectedException CharException
     * @expectedExceptionMessage Given parameter must be an array
     */
    public function testCharException() {
            $myObj = new Character('Olaf', 'monster');
            $abilities = 'Cursed Touch';
            $myObj->setAbilities($abilities);
    }
}