# PHP Class || Anti SQL Injection & Firewall

include("Firewall.php");

$Firewall = new Firewall();
$Firewall->SecureUris();

$name = $Firewall->getClean($_REQUEST["name"]);
