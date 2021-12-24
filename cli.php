
<?php
/** 
  * API NIK PARSE 
  * V.1.2
  * AUTHOR : ZLAXTERT
  * GITHUB : https://github.com/zlaxtert
  * INSTAGRAM : @banditcoding.xyz
  */

//banner
system("clear");
echo banner();
echo "[+] Enter your NIK >> ";
$nik = trim(fgets(STDIN));

if(strlen($nik) < 16){
    echo PHP_EOL.PHP_EOL."[!] PLEASE INPUT 16 DIGIT NIK [!]".PHP_EOL.PHP_EOL;
    exit();
}

//api nik parse
$url = "https://api.banditcoding.xyz/nik/v1/api.php?nik=$nik";

//curl

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $res = curl_exec($ch);
 curl_close($ch);
 $json = json_decode($res, true);

 $status    = $json['data']['response'];
 $provinsi  = $json['data']['info']['provinsi'];
 $kota      = $json['data']['info']['kota'];
 $kecamatan = $json['data']['info']['kecamatan'];
 $kode_pos  = $json['data']['info']['kode_pos'];
 $tg_lahir  = $json['data']['info']['others']['tgl_lahir2'];
 $umur      = $json['data']['info']['others']['umur'];
 $zodiac    = $json['data']['info']['others']['zodiac'];
 $gender    = $json['data']['info']['others']['gender'];
 $uniqCode  = $json['data']['info']['others']['uniqcode'];

//RESPONSE

 if(strpos($res, '"status":"success"')){
    echo "

    ======================[INFO]======================
    STATUS : $status 
     - NIK       : $nik
     - PROVINSI  : $provinsi
     - KOTA      : $kota
     - KECAMATAN : $kecamatan
     - KODEPOS   : $kode_pos
     - TGL LAHIR : $tg_lahir
     - UMUR      : $umur
     - ZODIAC    : $zodiac
     - GENDER    : $gender
     - UNIQCODE  : $uniqCode
    =====================[THANKS]======================  
";
    exit();
 }elseif(strpos($res, '"status":"failed"')){
    echo PHP_EOL.PHP_EOL."[!] INCCORECT NIK [!]".PHP_EOL.PHP_EOL;
    exit();
 }else{
    echo PHP_EOL.PHP_EOL."[!] CONNECTION ERROR [!]".PHP_EOL.PHP_EOL;
    exit();
 }

 function banner(){
    date_default_timezone_set("Asia/Jakarta");
    $date = date("l, d-m-Y (H:m:s)");

    // CURL 
    $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.banditcoding.xyz/dev/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $ok = curl_exec($ch);
    $js = json_decode($ok, TRUE);
    $ip      = $js['data']['info']['connection']['ip'];
    $isp     = $js['data']['info']['connection']['isp'];
    $country = $js['data']['info']['connection']['country'];
    
    // BANNER

    $banner = "
     _  ________ __        ___                  
    / |/ /  _/ //_/ ____  / _ \___ ________ ___ 
   /    // // ,<   /___/ / ___/ _ `/ __(_-</ -_)
  /_/|_/___/_/|_|       /_/   \_,_/_/ /___/\__/                                  

          $date
==================================================
   YOUR IP      : $ip
   YOUR ISP     : $isp
   YOUR COUNTRY : $country
==================================================
";
    return $banner;
}
?>
