
<?php
// Verilen XML içeriği
// XML dosyasının adı ve yolu
$xmlFile = 'kisiler.xml';

// XML dosyasını yükleme ve içeriğini okuma
$xml = simplexml_load_file($xmlFile);

// exam namespace'indeki Name öğesini alıp ekrana yazdırma
$name = $xml->children('soapenv', true)->Body->children('soapenv', true)->HelloWorldRequest->Name;
$year = $xml->children('soapenv', true)->Body->children('soapenv', true)->HelloWorldRequest->Years;

echo "Adı Ve Soyadı: $name <br> Doğum Yılı: $year "; 
?>
