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
        $I->see('Gutenberg');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');
        $I->click('login');

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

        $I->see($this->name);
        $I->see($this->surname);
        $I->see($this->title);
        $I->see($this->company_name);
        $I->see($this->birth_date);
        $I->see($this->birth_place);
        $I->see($this->social_security_number);
        $I->see($this->landline);
        $I->see($this->mobile);
        $I->see($this->email);

    }
}