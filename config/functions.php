<?php

/*
 * This file contain set of core php functions commonly used throughout the application.
 */

/*
 * Common function used to return response on failure.
 */

function failureResponse($errorMsg = "Error Occured!!") {
    $resData['message'] = $errorMsg;
    $response = ['code' => FAILURE_RESPONSE_CODE, 'resData' => $resData];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
}

/*
 * Common function used to return response on success.
 */

function successResponse($resData = []) {
    $response = ['code' => SUCCESS_RESPONSE_CODE, 'resData' => $resData];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
}

/*
 * Common function used to return response on both success & failure.
 */

function sendResponse($responseCode = FAILURE_RESPONSE_CODE, $resData = []) {
    $response = ['code' => $responseCode, 'resData' => $resData];
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
}

/*
 * Encode Data
 */

function encodeID($id) {
    if (class_exists('\Hashids\Hashids')) {
        $hashids = new \Hashids\Hashids('', 20);
        return $hashids->encode($id);
    } else {
        return encryptor('encrypt', $id);
    }
}

/*
 * Decode & Return First Elment
 */

function decodeID($encodedID) {
    if (class_exists('\Hashids\Hashids')) {
        $hashids = new \Hashids\Hashids('', 20);
        $arr = $hashids->decode($encodedID);
        return $arr[0];
    } else {
        return encryptor('decrypt', $encodedID);
    }
}

/*
 * Decode Data
 */

function decodeData($encodedID) {
    if (class_exists('\Hashids\Hashids')) {
        $hashids = new \Hashids\Hashids('', 20);
        return $hashids->decode($encodedID);
    } else {
        return encryptor('decrypt', $encodedID);
    }
}

/*
 * Sanitize Input Data
 */

function sanitize($input) {
    if (is_array($input)) {
        foreach ($input as $key => $value) {
            if (is_array($input)) {
                $input[$key] = sanitize($value);
            } else {
                $input[$key] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $value);
            }
        }
    } else {
        $input = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $input);
    }
    return $input;
}

/*
 * Customer function to encrypt data if Hashids not found
 */

function encryptor($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'gsyrreo';
    $secret_iv = 'uk';
    // hash
    $key = hash('sha256', $secret_key);
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    //do the encyption given text/string/number
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        //decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

/*
 * Customer function to encrypt data if Hashids not found
 */

function getFirstError($errors) {
    $errMsg = "Error Occured!!";
    try {
        $errors = array_shift($errors);        
        if (is_array($errors)) {
            return getFirstError($errors);
        }
        return $errors;
    } catch (\Exception $ex) {
        
    }
    return $errMsg;
}

// Getting the Message Out Of Error
function getFirstErrorClient($errors) {
    if (is_array($errors)) {
       return getFirstErrorClient(array_shift($errors));
       } else {
       return $errors;
   }
   return false;
}

/*
 * Function used to format price.
 */

function formatPrice($price, $decimal = 2) {
    // Add 0 after formating to remove unused zero after decimla. 
    // Ex : 25.5 should be displayed as 25.50
    $price = number_format((float) $price, $decimal, '.', '');
    if ($decimal > 2 && substr($price, -1) == 0) {
        $price = formatPrice($price, ($decimal - 1));
    }
    return $price;
}

function generateUniqNumber($id = NULL) {
    $uniq = uniqid(rand());
    if ($id) {
        return md5($uniq . time() . $id);
    } else {
        return md5($uniq . time());
    }
}


function generatePassword($length) {
    $vowels = 'aeuy';
    $consonants = '3@Z6!29G7#$QW4';
    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}