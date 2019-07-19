<?php

namespace tests\unit;

class UserAgeTest extends \Codeception\Test\Unit
{
    /** @test */
    public function correct_calculation_of_user_age()
    {
        $data = array(
            '39311110433' => '25',  //11-11-1993
            '38101310214' => '38',  //31-01-1981
            '46812224235' => '50',  //22-12-1968
            '38412190244' => '34',  //19-12-1984
            '37901290261' => '40'   //29-01-1979
        );

        foreach ($data as $personalCode => $userAge):
            $this->assertEquals($userAge, \app\models\User::getPersonsAge($personalCode));
        endforeach;
    }

    /** @test */
    public function incorrect_calculation_of_user_age()
    {
        $data = array(
            '38208052246' => '37',  //correct_age=>36
            '38101310214' => '16',  //correct_age=>30
            '48910160234' => '50',  //correct_age=>29
        );

        foreach ($data as $personalCode => $userAge):
            $this->assertNotEquals($userAge, \app\models\User::getPersonsAge($personalCode));
        endforeach;
    }
}
