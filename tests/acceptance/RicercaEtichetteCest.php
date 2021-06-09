<?php

class RicercaEtichetteCest
{
    public function crea(AcceptanceTester $I)
    {

        $I->login($I);
        $I->click('Prodotti');

        $I->click('Articoli');
        $I->click('nuovo');

        $I->see('Categoria');



    }

    public function cerca(AcceptanceTester $I)
    {

    }

    public function elimina(AcceptanceTester $I)
    {

    }
}