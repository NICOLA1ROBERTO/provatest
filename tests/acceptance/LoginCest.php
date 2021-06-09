<?php


class LoginCest
{


    public function loginSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Gutenberg');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');

        $I->click('login');
        $I->see('uscita');

    }

    public function loginFailed(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Gutenberg');
        $I->fillField('username', 'admin');
        $I->fillField('password', '');

        $I->click('login');
        $I->see('Password Errata');
        $I->dontSee('uscita');

    }
}
