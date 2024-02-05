<?php

require_once(realpath(__DIR__ . '/factories/ProduitFactory.php'));
require_once(realpath(__DIR__ . '/factories/ProduitPanierFactory.php'));

class DAL
{
    private $produitFact = null;
    private $CartProductFact = null;

    public function ProduitFact()
    {
        if ($this->produitFact == null) {
            $this->produitFact = new ProduitFactory();
        }

        return $this->produitFact;
    }

    public function CartProductFact()
    {
        if ($this->CartProductFact == null) {
            $this->CartProductFact = new ProduitPanierFactory();
        }

        return $this->CartProductFact;
    }

    
}
?>