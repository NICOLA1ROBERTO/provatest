<?php

class CreateAccompanyingInvoiceCest
{
    private $document = 'Fattura di vendita accopagnatoria';
    private $client = 'Telecom';
    private $code = 'AB1';
    private $row = 'Servizio';
    private $expected_price_goods = '80,00';
    private $expected_price_services = '10,55';
    private $expected_total = '90,55';

    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function createAccompanyingInvoice(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->login($I);

        $I->click('Vendite');
        $I->click('Movimenti di magazzino');
        $I->click('nuovo');

        $I->selectOption('select[name = "id_tipo_doc"]', $this->document);

        $I->autocompleteOption($I, 'ragione_sociale', $this->client);

        $I->click('OK');

        $I->click('nuova riga');
        $I->autocompleteOption($I, 'Cod_Art', $this->code);
        $I->fillField('Quantita', '100');
        $I->click('salva');

        $I->click('nuova riga');
        $I->selectOption('select[name = "tipo_riga"]', $this->row);
        $I->fillField('Des_Riga_Movimento', 'Contributo spese di trasporto');
        $I->fillField('Quantita', '1');
        $I->fillField('Prz_Merce', '10,55');
        $I->click('salva');

        $this->accompanyingInvoiceSuccess($I);
    }

    private function accompanyingInvoiceSuccess(AcceptanceTester $I)
    {
        $I->see($this->client);
        $I->see($this->expected_price_goods, '//*[@id="gerp-main-left"]/div[7]/table/tbody/tr[1]/td[2]');
        $I->see($this->expected_price_services, '//*[@id="gerp-main-left"]/div[7]/table/tbody/tr[2]/td[2]');
        $I->see($this->expected_total, '//*[@id="gerp-main-left"]/div[7]/table/tbody/tr[4]/td[2]');
    }
}
