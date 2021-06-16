<?php

class TaxCodesCest
{
    // If COD_IVA needs to change, its counterpart in templates/config/config_iva.tpl needs to change too
    const COD_IVA = 'CODCPT';

    private $des_iva = 'Test Codeception';
    private $perc_iva = '99';
    private $perc_indetraibile = '99';
    private $nature = 'N4 esenti';
    private $nature_code = 'N4';

    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function createTaxCode(AcceptanceTester $I)
    {
        $I->login($I);

        $I->click('Sistema');
        $I->click('Configurazione');
        $I->click('Iva - codici');
        $I->click('nuovo');

        $I->fillField('cod_iva', self::COD_IVA);
        $I->fillField('des_iva', $this->des_iva);
        $I->fillField('perc_iva', $this->perc_iva);
        $I->fillField('perc_indetraibile', $this->perc_indetraibile);
        $I->selectOption('select[name = "vett_parametri[natura]"]', $this->nature);

        $I->click('OK');

        $this->createTaxCodeSuccess($I);

        $this->deleteTaxCode($I);

        $this->deleteTaxCodeSuccess($I);
    }

    private function createTaxCodeSuccess(AcceptanceTester $I)
    {
        $I->dontSeeElement('//div[@class = "alert alert-danger"]');

        $I->see(self::COD_IVA);
        $I->see($this->des_iva);
        $I->see($this->perc_iva.',00%');
        $I->see($this->perc_indetraibile.',00%');
        $I->see($this->nature_code);
    }

    private function deleteTaxCode(AcceptanceTester $I)
    {
        $I->click('//*[@id="test"]');
        $I->acceptPopup();
    }

    private function deleteTaxCodeSuccess(AcceptanceTester $I)
    {
        $I->dontSee(self::COD_IVA);
        $I->dontSee($this->des_iva);
    }
}
