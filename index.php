<?php
error_reporting(0);
/*function ip(){
$x=array('27.'.rand(107,107),'42.'.rand(105,106),'61.'.rand(0,2),'124.'.rand(123,124),'203.'.rand(199,200),'221.'.rand(134,135),'220.224','219.64','218.248','210.210.'.rand(0,127),'210.18','205.253','203.101.'.rand(0,127),'203.88.'.rand(0,33),'183.82','182.94','182.60','182.56','182.19','180.215','180.179','180.178.'.rand(0,31),'180.151','175.101','175.40','171.76','171.48','169.149','165.42','164.164','164.100','162.56','158.144','157.48','157.32','144.16','139.167','137.97','136.185','128.185','125.99','124.253','124.7','123.236','123.201','123.63','122.184','122.176','122.160','121.240','121.50.'.rand(0,7),'120.56','119.226','118.185','118.94','117.192','117.96','116.202','116.119','116.72','115.240','115.96','114.143','113.193','113.19','112.110','112.79','111.93','111.92.'.rand(0,127),'110.234','110.224','106.192','106.76','101.208','101.56','61.246','60.243','59.184','59.176','59.144','49.236.'.rand(0,36),'49.204','14.140');
$x=$x[array_rand($x)];
$x1=rand(0,255);
$x2=rand(0,255);
if(substr_count($x,'.')=='2')$ip=$x.'.'.$x2;else $ip=$x.'.'.$x1.'.'.$x2;
return $ip;
}*/

#$cou=count(explode("\n",file_get_contents('ip.txt')));
Echo "Total Ip = $cou<Hr>";
for($i=0; $i<=9999; $i++){
    #for($i=0; $i<=3; $i++){
#$ip=ip();

$ip=long2ip(mt_rand());
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL,"https://iplocation.com:443");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_HTTPHEADER,['Host: iplocation.com','Connection: keep-alive','Accept: */*','Origin: https://iplocation.com','X-Requested-With: XMLHttpRequest','User-Agent: Mozilla/5.0 (Linux; U; Android 8.1.0; en-us; CPH1853 Build/OPM1.171019.026) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.80 Mobile Safari/537.36 OppoBrowser/15.6.2.5','Content-Type: application/x-www-form-urlencoded; charset=UTF-8','Referer: https://iplocation.com/']);
#$ipp=long2ip(mt_rand());
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"ip=$ip");
curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
$one=curl_exec($ch);
$json=json_decode($one,1);
	curl_close ($ch);
	$country=$json['country_name'];
	$state=$json['region_name'];
	$city=$json['city'];
	$company=$json['company'];
	$code=$json['country_code'];
	$postal=$json['postal_code'];
	$tz=$json['time_zone'];
/*if($city == true) {	
$file=fopen("ip.txt",'a');
fwrite($file,"$ip\n");
fclose($file);
}*/
#header('Refresh:1');

echo"
Ip Address:- $ip
Network Operator:- $company 
City:- $city
Pin Code:- $postal
State:- $state
Country:- $country
Country Code:- $code
Time Zone:- $tz
<........................>";


}#}
#Echo file_get_contents('ip.txt');

?>
