
<!DOCTYPE html>
<html>

<html lang="fr">
    <head>
        <title> Mon épicerie en ligne</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/site.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="shortcut icon" type="image/png" href="img/favicon/favicon-96x96.png"/>
    </head>

    <body> 
        <div class="container"> 
            <header> <h1>Mon épicerie en ligne</h1> 
                <div class="menu"> 
                <a href="index.php"> <i class="fa-sharp fa-solid fa-house"></i>&ensp; Accueil</a>&ensp;&ensp;|&ensp;&ensp;<a href="cart-view.php"><i class="fa-solid fa-cart-shopping"></i>&ensp; Mon panier</a> 
                </div>
           </header> 
           
           <main> 
            <h1> <?php echo $titre ?> </h1>
             <?= $content ?> 
           </main> 
           
            <footer> 
                <p class="your-name">Olivier Bergeron-Houde</p> <p>Tous droits réservés © cchic.ca</p> 
            </footer> 
        </div> 
    </body>
</html>

