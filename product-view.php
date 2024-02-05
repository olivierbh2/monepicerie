<?php 
require_once(realpath(__DIR__ . '/dal/DAL.php'));

$dal = new DAL();

$produit = $dal->ProduitFact()->GetProduit($_GET["id"]);
$titre = $produit->Nom;

ob_start(); 
?>

<div class="flex-container">
<div> <img src="img/<?=$produit->Image?>" alt="<?=$produit->Nom?>"> </div>
<div>
<br>
<table>
<tr><td class="bold">Détails du produit</td></tr>
<tr><td><?= $produit->Quantite ?> <?= $produit->Unite?></td></tr>
<tr><td><?= number_format($produit->Prix,2); ?> $</td></tr>
</table>
<br>
<form action="cart-process.php?action=add" method="post">
<label for="quantite">Quantité:</label>
<input type="number" id="nombre" name="nombre" min="1";>
<input type="hidden" id="id" name="id" value="<?=$produit->Id?>">

<br>
<br>
<input class="standard-button" type="submit" id="submit" value=" Ajouter au Panier">
</form>
</div>


</div>

<?php $content = ob_get_clean(); ?>
<?php require("includes/template.php");
?>
