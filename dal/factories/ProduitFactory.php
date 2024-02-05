<?php
require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/Produit.php'));



class ProduitFactory extends FactoryBase
{
    public function GetAllProduits() 
    { 
        $produits = array(); 

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM tp1_produits ORDER BY Id');
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $produits[] = new Produit($row);
        }
        $stmt->closeCursor();
        return $produits;
    }

    public function GetProduit($Id)
    { 
        $produit = null;

        $db = $this->dbConnect();
        $sql = "SELECT * FROM tp1_produits WHERE Id = $Id";
        $stmt = $db->prepare($sql);
        $stmt->execute([$Id]);

        if ($row = $stmt->fetch()) {
            $produit = new Produit($row);
        }

        $stmt->closeCursor();

        return $produit;

     }

   

        
}


?>