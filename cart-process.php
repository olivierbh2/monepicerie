<?php
require_once(realpath(__DIR__ . '/dal/DAL.php'));

function generateToken($length = 16)
 { $string = uniqid(rand());
   $randomString = substr($string, 0, $length);
   return $randomString; 
}


// générer ou importer le token
if (!isset($_COOKIE['token'])) {
    $nouveauToken = generateToken();
    setcookie('token', $nouveauToken, time() + 3600, '/');
    $token = $_COOKIE['token'];
} 
else 
{
    $token = $_COOKIE['token'];
}


// vérifier l'action

if (isset($_GET["action"]))
{

switch($_GET["action"])
{
case "add":
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $dal = new DAL();
    $check = $dal->CartProductFact()->CheckProduit($id, $token);
    
    switch($check)
    {
        case null:
        $dal->CartProductFact()->AddProduitPanier($id, $token ,$nombre);
        break;

        default:
       
    
        $newquantite = $check[0] + $nombre;
        $dal->CartProductFact()->UpdateProduit($id, $token, $newquantite);
        break;
    }
    
break;

    

case "remove":
$rowID = $_GET["rowid"];
$dal = new DAL();
$dal->CartProductFact()->RemoveProduitPanier($rowID);
break;

}

header("Location: cart-view.php");
}


?>