
<?php
/** 
  * API NIK PARSE 
  * V.1.2
  * AUTHOR : ZLAXTERT
  * GITHUB : https://github.com/zlaxtert
  * INSTAGRAM : @banditcoding.xyz
  */

//COMMAND LINE INTERFACE

$nik = readline("[+] Enter Your NIK : ");

//api nik parse
$url = "http://banditcoding.xyz/nik/api.php?nik=$nik";

//curl

 $ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 $res = curl_exec($ch);
 $json = json_decode($res, true);
 
 //GET ARRAY
 //$result = $json['info'];
 
 //output
 echo $res;
 
