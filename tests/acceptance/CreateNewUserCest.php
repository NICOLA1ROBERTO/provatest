<?php

class CreateNewUserCest
{
    private $name = 'Pinco';
    private $surname = 'Pallino';
    private $title = 'CEO';
    private $company_name = 'Pinco Pallino S.r.l';
    private $birth_date = '01/01/70';
    private $birth_place = 'Roma';
    private $social_security_number = 'PLLPNC70A01H501P';
    private $landline = '0001234567';
    private $mobile = '3330000000';
    private $email = 'pinco.pallino@esempio.it';

    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function createNewUser(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->login($I);

        $I->click('Sistema');
        $I->click('Utenti');
        $I->click('crea nuovo');

        $I->fillField('nome', $this->name);
        $I->fillField('cognome', $this->surname);
        $I->fillField('titolo', $this->title);
        $I->fillField('ragione_sociale', $this->company_name);
        $I->fillField('data_nascita', $this->birth_date);
        $I->fillField('des_localita_nas', $this->birth_place);
        $I->fillField('codice_fiscale', $this->social_security_number);
        $I->fillField('fisso', $this->landline);
        $I->fillField('mobile', $this->mobile);
        $I->fillField('email', $this->email);
        
        $I->click('OK');

        $this->createNewUserSuccess($I);

        $this->deleteNewUser($I);

        $this->deleteNewUserSuccess($I);
    }

    private function createNewUserSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->click('Sistema');
        $I->click('Utenti');
        $I->see($this->email);
    }

    private function deleteNewUser(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->click('Sistema');
        $I->click('Utenti');
        $I->see($this->email);
        $I->click($this->surname.' '.$this->name);
        $I->click('elimina');
        $I->acceptPopup();
    }

    private function deleteNewUserSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->click('Sistema');
        $I->click('Utenti');
        $I->dontSee($this->email);
    }
}
