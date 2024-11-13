<?php

//Veritabanı bağlantı bilgileri
$servername = "localhost";
$username = "elma_kitap";
$password = "SelcukEbrarSude05.";
$dbname = "elma_kitap";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Hata durumunu çalıştırın
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Bir hata oluştu: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST['ad']; 
    $soyad = $_POST['soyad'];
    $yas = $_POST['yas'];
    $egitim_durum = $_POST['egitim_durum'];
    $okudugu_kitap = $_POST['okudugu_kitap'];
    $kitap_tur = $_POST['kitap_tur'];
    $turk_yazar = $_POST['turk_yazar'];
    $yabanci_yazar = $_POST['yabanci_yazar'];
     // Verileri kaydetme işlemi burada
      try {
        $sql = "INSERT INTO kitap (ad, soyad, yas, egitim_durum, okudugu_kitap, kitap_tur, turk_yazar, yabanci_yazar) VALUES (:ad, :soyad, :yas, :egitim_durum, :okudugu_kitap, :kitap_tur, :turk_yazar, :yabanci_yazar)"; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ad', $ad); 
        $stmt->bindParam(':soyad', $soyad); 
        $stmt->bindParam(':yas', $yas);
        $stmt->bindParam(':egitim_durum', $egitim_durum); 
        $stmt->bindParam(':okudugu_kitap', $okudugu_kitap); 
        $stmt->bindParam(':kitap_tur', $kitap_tur); 
        $stmt->bindParam(':turk_yazar', $turk_yazar); 
        $stmt->bindParam(':yabanci_yazar', $yabanci_yazar); 
  
        $stmt->execute();
      } catch(PDOException $e) {
          echo "Bir hata oluştu: " . $e->getMessage();
      }
     // Formu temizler. 
    
  }
  
  ?>