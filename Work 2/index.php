<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $tckimlikno = $_POST['tckimlikno'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $dogumyili = $_POST['dogumyili'];

    try {
        // SOAP istemcisini oluşturuyoruz
        $istek = new SoapClient('https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL');

        // SOAP isteği gönderiyoruz
        $sonuc = $istek->TCKimlikNoDogrula(array(
            'TCKimlikNo' => $tckimlikno,
            'Ad' => $ad,
            'Soyad' => $soyad,
            'DogumYili' => $dogumyili
        ));

        // Sonucu kontrol ediyoruz ve ekrana yazdırıyoruz
        if ($sonuc->TCKimlikNoDogrulaResult) {
            echo "Bilgiler doğru";
        } else {
            echo "Bilgiler hatalı";
        }

    } catch (Exception $exc) {
        // Hata mesajını ekrana yazdırıyoruz
        echo "Hata: " . $exc->getMessage();
    }
} else {
    echo "Lütfen formu doldurup gönderin.";
}
?>
