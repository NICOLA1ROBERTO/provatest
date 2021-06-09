<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

	public function login($I)
	{

		$I->amOnPage('/');
        $I->see('Gutenberg');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');
        $I->click('login');
        $I->see('uscita');

	}

}
