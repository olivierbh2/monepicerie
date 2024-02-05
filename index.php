
<?php 
$titre = 'Nos produits disponibles';
require_once(realpath(__DIR__ . '/dal/DAL.php'));



ob_start(); 
// générer ou importer le token
if (!isset($_COOKIE['token'])) {
    $nouveauToken = generateToken();
    setcookie('token', $nouveauToken, time() + 99999999, '/');
    $token = $_COOKIE['token'];
} 
else 
{
    $token = $_COOKIE['token'];
}


$dal = new DAL();
$produits = array();

$produits = $dal->ProduitFact()->GetAllProduits();
?>

<div class="product-list">
<?php 
foreach ($produits as $prod)
{
    
    ?>
    <div class="product-item">

    <div class="product-image">
    <img src="img/<?= $prod->Image?>" alt="<?=$prod->Nom?>">
    </div>

    <div class="product-name">
    <?php echo $prod->Nom ?>
    </div>

    <a class="standard-button" href="product-view.php?id=<?= $prod->Id?>">Voir l'article</a>

    </div>
<?php
}?>
</div>
   


<?php $content = ob_get_clean(); ?>
<?php require("includes/template.php");?>

