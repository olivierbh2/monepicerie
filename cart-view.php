<?php 
require_once(realpath(__DIR__ . '/dal/DAL.php'));

function generateToken($length = 16)
 { $string = uniqid(rand());
   $randomString = substr($string, 0, $length);
   return $randomString; 
}

if (!isset($_COOKIE['token'])) {
    $nouveauToken = generateToken();
    setcookie('token', $nouveauToken, time() + 99999999999999, '/');
    $token = $_COOKIE['token'];
} 
else 
{
    $token = $_COOKIE['token'];
}

$titre = "Votre panier d'achat";

ob_start(); 

$dal = new DAL();
$produitscart = array();
$produitscart = $dal->CartProductFact()->GetAllProduitsPanier($token);
$montantTotal = 0;

if ($produitscart != null)
{


foreach($produitscart as $prod)
{
    $dal = new DAL();
    $leproduit = $dal->ProduitFact()->GetProduit($prod->ProduitId);
    $quantitetotale = $prod->Quantite * $leproduit->Quantite;
    $totalrow = $prod->Quantite * $leproduit->Prix;
    $montantTotal = $montantTotal + $totalrow;
    ?>
<center>
    <div class="cart-row">
     
            <div class="cart-image">
            <img src="img/<?= $leproduit->Image?>" alt="<?=$leproduit->Nom?>">
            </div>
            
            <div>&emsp;&emsp;<?=$prod->Quantite?> x <?=$leproduit->Nom?> &emsp;&emsp;</div>

            <div>&emsp;&emsp;<?=$quantitetotale?> <?=$leproduit->Unite?>&emsp;&emsp;</div>

            <div>&emsp;&emsp;<?=number_format($totalrow, 2);?> $&emsp;&emsp;</div>

<div>   

                <a href="cart-process.php?action=remove&rowid=<?=$prod->Id?>"><i class="fa-solid fa-trash"></i></a>
</div>


      
</center>
<?php
}

}else

{
    echo "<center> <h2>Il n'y a aucun item dans votre panier.</h2> </center>";
}
?>



<center>
<p> Coût total : <?=number_format($montantTotal, 2);?> $ </p>
<a class="standard-button" href="index.php">Continuer votre magasinage</a>
</center>
<br>

<?php $content = ob_get_clean(); ?>
<?php require("includes/template.php");?>
