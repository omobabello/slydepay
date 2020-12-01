<?php
/***
******author: Bello Opeyemi
******description: Library for intergration of slydepay payment gateway
***/
defined('BASEPATH') or exit('No direct access allowed');

class Slydepay{

    public function __construct(){

    }

    public function payment_options(){
      //This function retrieves all possible list of payment options on Slydepay

      $curl = $curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/payoptions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 2, //if website is ssl, remove this line
        CURLOPT_SSL_VERIFYPEER => FALSE, // if website is ssl, remove this line
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => array(
          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
        ),
      ));

      $response = curl_exec($curl); //gets the responce
      $error = curl_error($curl); //gets the curl error if there is any

      curl_close($curl);

      return ($error) ? 'Curl Error :'.$error : json_decode($response);
    }

    public function create_invoice($params){
      //This helps generate a token for a customer;
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/create",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 2, //if website is ssl, remove this line
        CURLOPT_SSL_VERIFYPEER => FALSE, // if website is ssl, remove this line
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $error = curl_error($curl);

      curl_close($curl);

      return ($error) ? 'Curl Error :'.$error : json_decode($response);
    }

    public function payment_status($params){
      //This function checks the payment status of an invoice

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/checkstatus",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 2, //if website is ssl, remove this line
        CURLOPT_SSL_VERIFYPEER => FALSE, // if website is ssl, remove this line
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($params),
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $error = curl_error($curl);

      curl_close($curl);

      return ($error) ? 'Curl Error :'.$error : json_decode($response);
  }

  public function confirm_transaction($params){
    // This function confirm a transaction
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://app.slydepay.com/api/merchant/transaction/confirm",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 2, //if website is ssl, remove this line
      CURLOPT_SSL_VERIFYPEER => FALSE, // if website is ssl, remove this line
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($params),
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    return ($error) ? 'Curl Error :'.$error : json_decode($response);
  }

  public function cancel_transaction($params){
    //This function cancels a trasaction

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/checkstatus",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 2, //if website is ssl, remove this line
      CURLOPT_SSL_VERIFYPEER => FALSE, // if website is ssl, remove this line
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($params),
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
      ),
    ));

    $$response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    return ($error) ? 'Curl Error :'.$error : json_decode($response);

  }
}
