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

	public function autocompleteOption($I, $element, $input)
    {

    	// For example: $input = 'Telecom'

    	// Type 'Teleco' in field, then fillField() loses focus
        $I->fillField($element, substr($input, 0, strlen($input) - 1));

        // Regain focus by typing the last letter ('m')
        $I->pressKey('//*[@id="'.$element.'"]', $input[strlen($input) - 1]);
        $I->wait(1.5);
        
        // pressKey() doesn't lose focus, so the options are visible
        $I->click('//*[@id="ui-id-1"]/li[1]');

    }

}
