<?php
require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/CartProduct.php'));

class ProduitPanierFactory extends FactoryBase
{
    public function GetAllProduitsPanier($token) 
    { 
        $produits = array(); 

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM tp1_panier ORDER BY Id');
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $produits[] = new CartProduct($row);
        }
        $stmt->closeCursor();
        return $produits;
    }

    public function AddProduitPanier($produitID, $token, $quantite) 
    { 

        $Id = $produitID;

        $db = $this->dbConnect();
        $stmt = $db->prepare('INSERT INTO tp1_panier (ProduitId, Quantite, Token) VALUES (?, ?, ?) ');
        $stmt->execute([$produitID, $quantite, $token]);

      
        
        $stmt->closeCursor();

    }

    public function CheckProduit($produitID, $token)
    { 
        $quantite = null;
        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT Quantite FROM tp1_panier WHERE ProduitId = ? AND Token = ?');
        $stmt->execute([$produitID, $token]);
        
        while ($row = $stmt->fetch()) {
            $quantite = $row;
        }

        $result = $stmt->fetch();
        $stmt->closeCursor();

        return $quantite;
     }

    public function UpdateProduit($produitID, $token, $newquantite)
    { 
 
        $db = $this->dbConnect();
        $stmt = $db->prepare('UPDATE tp1_panier SET Quantite = ? WHERE ProduitId = ? AND Token = ?');
        $stmt->execute([$newquantite, $produitID, $token]);

        $stmt->closeCursor();

     }

    public function RemoveProduitPanier($rowID)
    { 
        
        $db = $this->dbConnect();
        $stmt = $db->prepare('DELETE FROM tp1_panier  WHERE Id = ?');
        $stmt->execute([$rowID]);

        $stmt->closeCursor();
    
    }

    
}
?>
