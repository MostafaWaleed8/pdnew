<?php
include("CONN.php");
$token =  "Tfwjij9tbcHVD95LUQfsOtbfcEEkw1hkDGvUbWPs9CscSxZOttanv3olA6U6f84tBCXX93GpEqkaP_wfxEyNawiqZRb3Bmflyt5Iq5wUoMfWgyHwrAe1jcpvJP6xRq3FOeH5y9yXuiDaAILALa0hrgJH5Jom4wukj6msz20F96Dg7qBFoxO6tB62SRCnvBHe3R-cKTlyLxFBd23iU9czobEAnbgNXRy0PmqWNohXWaqjtLZKiYY-Z2ncleraDSG5uHJsC5hJBmeIoVaV4fh5Ks5zVEnumLmUKKQQt8EssDxXOPk4r3r1x8Q7tvpswBaDyvafevRSltSCa9w7eg6zxBcb8sAGWgfH4PDvw7gfusqowCRnjf7OD45iOegk2iYSrSeDGDZMpgtIAzYVpQDXb_xTmg95eTKOrfS9Ovk69O7YU-wuH4cfdbuDPTQEIxlariyyq_T8caf1Qpd_XKuOaasKTcAPEVUPiAzMtkrts1QnIdTy1DYZqJpRKJ8xtAr5GG60IwQh2U_-u7EryEGYxU_CUkZkmTauw2WhZka4M0TiB3abGUJGnhDDOZQW2p0cltVROqZmUz5qGG_LVGleHU3-DgA46TtK8lph_F9PdKre5xqXe6c5IYVTk4e7yXd6irMNx4D4g1LxuD8HL4sYQkegF2xHbbN8sFy4VSLErkb9770-0af9LT29kzkva5fERMV90w"; 
$basURL = "https://apitest.myfatoorah.com";
$customerName = mysqli_real_escape_string($conn,trim($_POST['fname']))." ".mysqli_real_escape_string($conn,trim($_POST['lname']));
$NameOnCard = mysqli_real_escape_string($conn,trim($_POST['noc']));
$customerEmail = mysqli_real_escape_string($conn,trim($_POST['email']));
$phoneCode = mysqli_real_escape_string($conn,trim($_POST['countryCode']));
$phoneNumber = mysqli_real_escape_string($conn,trim($_POST['phone']));
$customerCity = mysqli_real_escape_string($conn,trim($_POST['city']));
$address = mysqli_real_escape_string($conn,trim($_POST['address']));
$country = mysqli_real_escape_string($conn,trim($_POST['country']));
$purchasedPlane = mysqli_real_escape_string($conn,trim($_POST['plan-select']));
//price
  if($purchasedPlane == "Economy Plan"){$price = "9.99";};
  if($purchasedPlane == "Recommended Plan"){$price = "19.99";};
  if($purchasedPlane == "Business Plan"){$price = "49.99";};
//
$bytes = random_bytes(10);
$transactionID = bin2hex($bytes);
$secURL = "https://www.google.com/";
$failURL = "https://www.google.com/";

$cardnumber = mysqli_real_escape_string($conn,trim($_POST['ccn']));
$expiryMonth = mysqli_real_escape_string($conn,trim($_POST['exp-mo']));
$expiryyear = mysqli_real_escape_string($conn,trim($_POST['exp-year']));
$securityCode = mysqli_real_escape_string($conn,trim($_POST['cvv']));
$emailc = mysqli_query($conn,"SELECT * FROM register where Email='$customerEmail'");
if(mysqli_num_rows($emailc)>0)
{
    echo "userEX"; 
    exit;
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "$basURL/v2/ExecutePayment",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"PaymentMethodId\":\"2\",\"CustomerName\": \"$customerName\",\"DisplayCurrencyIso\": \"SAR\", \"MobileCountryCode\":\"$phoneCode\",\"CustomerMobile\": \"$phoneNumber\",\"CustomerEmail\": \"$customerEmail\",\"InvoiceValue\": $price,\"CallBackUrl\": \"$secURL\",\"ErrorUrl\": \"$failURL\",\"Language\": \"en\",\"CustomerReference\" :\"$transactionID\",\"UserDefinedField\": \"$purchasedPlane\",\"CustomerAddress\" :{\"Block\":\"$customerCity\",\"Address\":\"$address\",\"AddressInstructions\":\"$country\"}}",
  CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$json  = json_decode((string)$response, true);
$payment_url = $json["Data"]["PaymentURL"];

    
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "$payment_url",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"paymentType\": \"card\",\"card\": {\"Number\":\"$cardnumber\",\"expiryMonth\":\"$expiryMonth\",\"expiryYear\":\"$expiryyear\",\"securityCode\":\"$securityCode\",\"CardHolderName\":\"$NameOnCard\"},\"saveToken\": false}",
  CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$josnDecode = json_decode($response,true);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "sufail";
} else {
  if($josnDecode['IsSuccess'] == false){
    echo "sufail";
  }else{
    $password  = md5(mysqli_real_escape_string($conn,trim($_POST['password'])));
    $phone = $phoneCode.$phoneNumber;
    $query="INSERT INTO register(Name, Email, Password, phone , city , address , country , purchasedPlane , transactionID ) VALUES ('$customerName', '$customerEmail ', '$password', '$phone','$customerCity','$address','$country','$purchasedPlane','$transactionID')";
    $sql=mysqli_query($conn,$query);
    echo "susec" ;
  }
}
?>