<?php 

$apikey = "b19e5a7c44bb1a95bddbe0489aa29295";
$cityName = $_GET['name'];
$endURL = "api.openweathermap.org/data/2.5/weather?q=".$cityName."&lang=eng&unit=metric&APPID=".$apikey;
$curl = curl_init();

curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_URL, $endURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response, true);
$result = [];
if(isset($data['name'])){
    $result = [
        'name'=>$data['name'],
        'longitude'=>$data['coord']['lon'],
        'latitude'=>$data['coord']['lat'],
        'windSpeed'=>$data['wind']['speed'],
        'pressure'=>$data['main']['pressure'],
        'humidity'=>$data['main']['humidity'],
        'minTemp'=>$data['main']['temp_min'],
        'maxTemp'=>$data['main']['temp_max'],
        'date'=>date('H:i s',strtotime($data['dt'])),
        'countryCode'=>$data['sys']['country'],
    ];
}
echo json_encode($result);




?> 
