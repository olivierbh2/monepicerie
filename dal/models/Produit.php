<?php
class Produit
{
    public $Id;
    public $Nom;
    public $Quantite;
    public $Unite;
    public $Prix;
    public $Image;


    public function __construct($sql_row)
    {
        if (isset($sql_row)) {
        $this->Id = $sql_row['Id'];
        $this->Nom = $sql_row['Nom'];
        $this->Quantite = $sql_row['Quantite'];
        $this->Unite = $sql_row['Unite'];
        $this->Prix = $sql_row['Prix'];
        $this->Image = $sql_row['Image'];
        }
    }
}
?>