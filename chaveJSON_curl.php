<?php

// usando curl
// consumindo JSON
// usando simpleXML para gerar HTML

// $respostaXMLString = file_get_contents("http://alunos.estg.ipvc.pt/~pmoreira/KEYSERVER/KeyServerXML.php"); 

$ch = curl_init("http://alunos.estg.ipvc.pt/~pmoreira/KEYSERVER/KeyServerJSON.php");

curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

$respostaJSONString = curl_exec($ch);
curl_close($ch);



$chavePHP = json_decode($respostaJSONString); 





$chaveXHTML = new simpleXMLElement("<div/>");
$chaveXHTML->addAttribute("class","key");

$uln = $chaveXHTML->addChild("ul");
$uln->addAttribute("class","numbers");

$uls = $chaveXHTML->addChild("ul");
$uls->addAttribute("class","stars");

foreach ($chavePHP->numbers as $number) {
	$uln->addChild("li",$number);
}

foreach ($chavePHP->stars as $number) {
	$uls->addChild("li",$number);
}

echo $chaveXHTML->asXML();



?>