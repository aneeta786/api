<?php
function getApiData($url){
    $crl = curl_init();
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($crl);
    if(!$response){
        die('Error: "' . curl_error($crl) . '" - Code: ' . curl_errno($crl));
    }

    curl_close($crl);
    return $response;
}

$api_url = "https://dummy.restapiexample.com/api/v1/employees";
$data = getApiData($api_url);

$json = json_decode($data, true);

$datas =  $json['data'];
foreach ($datas as $key => $value) {
	echo "<pre>";
print_r($value['employee_name']);
print_r($value['employee_salary']);
echo "</pre>";
}

