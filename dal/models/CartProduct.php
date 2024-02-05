<?php
class CartProduct
{
    public $Id;
    public $ProduitID;
    public $Quantite;
    public $Token;
    


    public function __construct($sql_row)
    {
        if (isset($sql_row)) {
        $this->Id = $sql_row['Id'];
        $this->ProduitId = $sql_row['ProduitId'];
        $this->Quantite = $sql_row['Quantite'];
        $this->Token = $sql_row['Token'];
       
        }
    }
}
?>