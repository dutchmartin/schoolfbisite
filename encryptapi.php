<?php
// zorgt ervoor dat andere domeinen ook de api kunnen benaderen
header('Access-Control-Allow-Origin: *');

/**
 * een check of de informatie ontsleuteld of versleuteld moet worden
 * voert vervolgens de juiste functie uit
 */
 $key = "2M1DBq054GrdpI1G3ZSnXX?NT[Z61";
 $tekst = $_POST['text']; // mogelijk onveilig
 if ( $_GET['encrypt'] == 1 )
 {
 	// ga versleutelen
 	versleutelen($tekst, $key);
 }
 else
 {
 	// ontsleutel het
 	ontsleutelen($tekst, $key);
 }

/**
 * Functie voor het versleutelen van tekst.
 *
 * @param $tekst De tekst die moet worden versleuteld.
 * @param $geheime_sleutel De sleutel waarmee de tekst moet worden versleuteld.
 * @return Een standard output die de versleutelde tekst bevat.
 *
 */
function versleutelen($tekst, $geheime_sleutel) {
 $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
 $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
 $versleutelde_tekst = mcrypt_encrypt(MCRYPT_BLOWFISH, $geheime_sleutel,
utf8_encode($tekst), MCRYPT_MODE_ECB, $iv);
 echo base64_encode($versleutelde_tekst);
}
/**
 * Functie voor het ontsleutelen van tekst.
 *
 * @param $tekst De tekst die moet worden ontsleuteld.
 * @param $geheime_sleutel De sleutel waarmee de tekst moet worden ontsleuteld.
 * @return Een standard output die de ontsleutelde tekst bevat.
 */
function ontsleutelen($tekst, $geheime_sleutel) {
 $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
 $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
 $ontsleutelde_tekst = mcrypt_decrypt(MCRYPT_BLOWFISH, $geheime_sleutel,
base64_decode($tekst), MCRYPT_MODE_ECB, $iv);
 echo trim($ontsleutelde_tekst, "\0");
}



?>
