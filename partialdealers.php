<?php
header("Content-Type: application/json");
//conexión base de datos
$pdo=new PDO("mysql:host=localhost; dbname=nicolas_partial; charset=utf8", "nicolas_partial", "partial");
$sentenciaSQL = $pdo->prepare("Call Request_Dealerships_Office()");
$sentenciaSQL->execute();
//ejecución de procedimiento de almacenado
$datos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$eventos = array();
foreach($datos as $resultado){
    //contenido de key country_iso_code
    $country_iso_code = $resultado['country_iso_code'];
    $countryname = $resultado['namecountry'];

    //contenido de key dealership_id
    $dealership_id = $resultado['dealership_id'];
    $name = $resultado['namedel'];
    $address = $resultado['addressdel'];
    $phone = $resultado['phonedel'];
    $email = $resultado['emaildel'];
    $coverage_area = $resultado['coveragedel'];
    $salesforce_dealercode_cl = $resultado['salesforcedel'];

    //contenido de key dealership_id
    $office_id = $resultado['office_id'];
    $address = $resultado['address'];
    $description_form = $resultado['description_form'];
    $email = $resultado['email'];
    $phone = $resultado['phone'];
    $phone2 = $resultado['phone2'];
    $zone_iso_code = $resultado['zone_iso_code'];
    $subzone_id = $resultado['subzone_id'];
    $latitude = $resultado['latitude'];
    $longitude = $resultado['longitude'];
    $dealership_id = $resultado['dealership_id'];
    $point_sales = $resultado['point_sales'];
    $service_workshop = $resultado['service_workshop'];
    $spare_parts = $resultado['spare_parts'];
    $territory = $resultado['territory'];
    $weekday_sales = $resultado['weekday_sales'];
    $weekday_service = $resultado['weekday_service'];
    $weekend_sales = $resultado['weekend_sales'];
    $weekend_service = $resultado['weekend_service'];
    $code_salazar_israel_cl = $resultado['code_salazar_israel_cl'];
    $order = $resultado['order'];

    //adjunta los datos en arrays con subíndices
    $eventos[] = array(
      'country_iso_code' => array('code'=>$country_iso_code,'namecountry'=>$countryname,
      'dealership_id'=>array('id'=>$dealership_id,'name'=>$name,'address'=>$address,'phone'=>$phone,'email'=>$email,'coverage_area'=>$coverage_area,'salesforce_dealercode_cl'=>$salesforce_dealercode_cl,
      'dealerships_offices'=>array(
          $office_id,
          $address,
          $description_form,
          $email,
          $phone,
          $phone2,
          $zone_iso_code,
          $subzone_id,
          $latitude,
          $longitude,
          $dealership_id,
          $point_sales,
          $service_workshop,
          $spare_parts,
          $territory,
          $weekday_sales,
          $weekday_service,
          $weekend_sales,
          $weekend_service,
          $code_salazar_israel_cl,
          $order
      )))
    );
}
//convierte e imprime en formato json los datos almacenados en arrays
echo json_encode($eventos, JSON_UNESCAPED_UNICODE);
?>
