<?php
// INFOS DE LA BDD
$dns = "mysql:host=127.0.0.1;dbname=colyseum;charset=utf8";
$user = "root";
$password = '';

try {
    //TEST DE LA CONNEXION A LA BDD
    $bdd = new PDO($dns, $user, $password);
    echo "La connection est ok ! <br><br>";
}
// POUR GERER LES ERREURS
catch (PDOEXCEPTION $e) {
    $error = $e->getMessage();
}
?>

<?php
$queryClients = $bdd->query('SELECT * FROM clients');
$clients = $queryClients->fetchAll();
?>

<?php
function pretyDump($data){
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}

// EXERCICE 1 :
// pretyDump($clients); 
?>

<?php
// EXERCICE 2 :
$queryShows = $bdd->query('SELECT * FROM shows');
$shows = $queryShows->fetchAll();
// pretyDump($shows);
?>

<?php
// Exercice 3 : 
// $clients = array_slice($clients, 0, 20);
// pretyDump($clients);
    
?>

<?php
// Exercice 4 :
// $queryClientsWithCard = $bdd->query('SELECT * FROM clients WHERE cardNumber != NULL');
// $clientsWithCards = $queryClientsWithCard->fetchAll();
// pretyDump($clientsWithCards);
?>

<?php
// Exercice 5 : 
// // $queryClientsM = $bdd-> query('SELECT * 
// FROM clients 
// WHERE lastName 
// LIKE 'M%' ORDER BY 
// lastName');

// $clientsM = $queryClientsM -> fetchAll();
// pretyDump($clientsM);
?>

<?php
// Exercice 6 :
// setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
// $queryShowsNewDate = $bdd->query('SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS 'niceDate' FROM `shows`');
// $showsNewDate = $queryShowsNewDate->fetchAll();
// foreach ($shows as $show) {
//     echo "<p>{$show['title']} par {$show['performer']} le {$showsNewDate} à {$show['startTime']}</p> ";
// }
?>

<?php
// Exercice 7 : 

foreach ($clients as $client) {
    if ($client['card'] == 1 ){
        echo " OUI";
    } else{
        echo " NON";
    }
    echo "<p>Nom : {$client['lastName']} Prénom : {$client['firstName']} Date de naissance : {$client['birthDate']} Carte de fidélité {$client['card']} Numéro de Carte : {$client['cardNumber']}";
}