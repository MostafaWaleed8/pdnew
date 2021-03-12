<?php
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$qoury = "$lat,$lon";
$queryString = http_build_query([
    'access_key' => '44b691567df7f9c55e1bbf6f2ccc6566',
    'query' =>  $qoury,
    'limit' => 1,
  ]);
  
  $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/reverse', $queryString));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
  $json = curl_exec($ch);
  
  curl_close($ch);

 
echo $json;

  

?>