<?php

include("config.php");

$demande_id = $_POST['demande_id'];
$auteur_code = $_POST['auteur_code'];
$auteur_nom = $_POST['auteur_nom'];
$auteur_tel = $_POST['auteur_tel'];
$message = $_POST['message'];

$sql = "INSERT INTO propositions
(
demande_id,
auteur_code,
auteur_nom,
auteur_tel,
message
)
VALUES
(
'$demande_id',
'$auteur_code',
'$auteur_nom',
'$auteur_tel',
'$message'
)";

mysqli_query($conn,$sql);

echo "success";

?>