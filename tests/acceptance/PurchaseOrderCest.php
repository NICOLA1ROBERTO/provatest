<?php

class PurchaseOrderCest
{
    public function crea(AcceptanceTester $I)
    {
        $I->login($I);
        $I->click('Prodotti');

        $I->click('Ordini a Fornitore');
        $I->click('nuovo');

        $I->see('Fornitore');
    }

    public function creaDaFornitore(AcceptanceTester $I)
    {
        $I->login($I);
        $I->click('Prodotti');

        $I->click('Fornitori');
        $I->click('visualizza');

        $I->click('nuovo ordine a fornitore');
        $I->click('OK');

        $I->see('Fornitore');
    }

    public function cerca(AcceptanceTester $I)
    {

    }

    public function elimina(AcceptanceTester $I)
    {

    }
}