<?php
error_reporting(false);
header('Content-type: application/json;');
//=========================================================
if($_GET['name'] !== null){
$name = $_GET['name'];
}

function GetContents($url){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36');
    return curl_exec($curl);
    curl_close($curl);
}
//=========================================================
$kobs = file_get_contents("https://fake-it.ws/");
preg_match_all('#<a href="/(.*?)/"><img src="https://fake-it.ws/images/flags/(.*?).svg" class="flag-icon" data-toggle="tooltip" data-placement="top" title="(.*?)"></a>#', $kobs, $kob);
for($i=0; $i<count($kob[3]); $i++){
if($kob[3][$i]==$name)
$link = $kob[2][$i];
}
$das =['country'=>$kob[3]];
$pptprs[]=$das;
//=========================================================
$fake = GetContents('https://fake-it.ws/'.$link."/");
//=========================================================
preg_match_all('#scope="row">(.*?)</th>#', $fake, $title1);
//=========================================================
preg_match_all('#data-placement="top" title="Click To Copy">(.*?)</td>#', $fake, $user);
//=========================================================
$use1 =str_replace(["</span>"],[""],$user[1]);    
//=========================================================
$da =['name'=>$use1[1],'Address'=>$use1[2],'City'=>$use1[3],'Postcode'=>$use1[4],'Gender'=>$use1[5],'Date Of Birth'=>$use1[6],'Phone'=>$use1[7],'Mothers Maiden Name'=>$use1[9],'Ethnicity'=>$use1[10],'Age (Years)'=>$use1[11],'diac Sign'=>$use1[12],'Height'=>$use1[13],'Weight'=>$use1[14],'Hair Color'=>$use1[15],'Eye Color'=>$use1[16],'Credit Card Number'=>$use1[18],'Credit Card Expiry'=>$use1[19],'Credit Card CVV2'=>$use1[20],'IPV4 Address'=>$use1[23],'IPV6 Address'=>$use1[24],'User Agent'=>$use1[25],'Qualification'=>$use1[26],'Institution'=>$use1[27],'Company Name'=>$use1[28],'Salary'=>$use1[29],'Job Title'=>$use1[30],'Company Phone'=>$use1[31],'Vehicle'=>$use1[33],'License Plate'=>$use1[34],'VIN'=>$use1[35],'Color'=>$use1[36]];
$pptpr[]=$da;
//========================================================= 
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71',  'Results' =>$pptpr , 'country' => $pptprs], 448);
//========================================================= 












