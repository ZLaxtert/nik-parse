<?php
   //zlaxtert

$nik = readline("[+] Enter Your NIK : ");

//api nik parse
$url = "http://api.blacknetid.pw/nik/api.php?nik=$nik";

//curl

 $ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 $res = curl_exec($ch);
 
 //output
echo $res;
