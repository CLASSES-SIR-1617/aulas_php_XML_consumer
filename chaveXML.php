<?php

// usando file_get_contents
// consumindo XML com SimpleXML
// usando simpleXML para gerar HTML

$respostaXMLString = file_get_contents("http://alunos.estg.ipvc.pt/~pmoreira/KEYSERVER/KeyServerXML.php"); 


$respostaXML =  simplexml_load_string($respostaXMLString);


var_dump($respostaXML->numbers->num);

// forma 1  : echos

echo "<div class = 'key'>";
echo "<ul class = 'numbers'>";
foreach ($respostaXML->numbers->num as $number) {
	echo "<li>" . $number . "</li>";
}
echo "</ul>";

echo "<ul class = 'stars'>";
foreach ($respostaXML->stars->num as $number) {
	echo "<li>" . $number . "</li>";
}
echo "</ul>";
echo "</div>";

// forma 2 : simpleXML


$chaveXHTML = new simpleXMLElement("<div/>");
$chaveXHTML->addAttribute("class","key");

$uln = $chaveXHTML->addChild("ul");
$uln->addAttribute("class","numbers");

$uls = $chaveXHTML->addChild("ul");
$uls->addAttribute("class","stars");

foreach ($respostaXML->numbers->num as $number) {
	$uln->addChild("li",$number);
}

foreach ($respostaXML->stars->num as $number) {
	$uls->addChild("li",$number);
}

echo $chaveXHTML->asXML();



?>