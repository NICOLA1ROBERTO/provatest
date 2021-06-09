<?php


class CreateNewClientCest
{


    private $client_name = 'Wayne Enterprise';
    private $client_person = 'Bruce Wayne';
    private $client_city = 'Gotham City';

    private $client_location = 'Batcave';

    private $client_address_location = 'Wayne "Manor" underground';


    private $random_code;

    public function _before(AcceptanceTester $I)
    {
        $this->random_code = 'C'.rand();


    }



    // tests
    public function createClient(AcceptanceTester $I)
    {
        $I->login($I);
        $I->click('Vendite');

        $I->click('Clienti');
        $I->click('nuovo cliente');
        $I->fillField('ragione_sociale', $this->client_name);

        $I->fillField('des_contatto', $this->client_person);
        $I->fillField('citta', $this->client_city);

        $I->fillField('cod_esterno', $this->random_code);

        $I->fillField('codice_fiscale', '000');
        $I->click('OK');

        $I->see($this->client_name);
        $I->see($this->client_city);
        $I->see($this->client_person);

        $I->checkForPhpNoticesOrWarnings();

        $I->click('Sedi');
        $I->click('nuova');
        $I->fillField('des_sede',$this->client_location);
        $I->fillField('indirizzo', $this->client_address_location);
        $I->click('OK');
        $I->see($this->client_address_location);


        $this->searchClientMainSearch($I);

        $this->deleteClient($I);



    }

    private function searchClientMainSearch(AcceptanceTester $I)
    {



        $I->fillField('testo_ric', $this->random_code);
        $I->click('vai');

        $I->see($this->client_name);



    }

    private function deleteClient(AcceptanceTester $I)
    {
        $I->click('Vendite');

        $I->click('Clienti');

        $I->click($this->client_name);
        $I->click('elimina');
        $I->acceptPopup();
        $I->dontSee($this->client_name);
        


    }


}
