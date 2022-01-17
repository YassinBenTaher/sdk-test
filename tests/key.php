<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Helpers\Crypto\SpCrypto;
use Helpers\Crypto\SpEcKeyPair;
use Helpers\Security\DigitalSignature\EccSignatureManager;
use ParagonIE\EasyECC\EasyECC;

/* $list = new SpCrypto();
 print_r($list->GenerateKeyPair());

$prKey = `-----BEGIN EC PRIVATE KEY-----
MHcCAQEEIFpY6HmL9XkGQFpygXyRLkUTMldnN6RpJ5XHbDaJ942joAoGCCqGSM49
AwEHoUQDQgAEQ72zZNQVi56fpJySdeMpdEuv2SkjiPKojaQSEyQwMI0Lz7Ojlzr4
KA0DeDOcBxuu1l/kZHeyrkIzves+vX4rJg==
-----END EC PRIVATE KEY-----`;

$pubKey = `-----BEGIN PUBLIC KEY-----
MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEQ72zZNQVi56fpJySdeMpdEuv2Skj
iPKojaQSEyQwMI0Lz7Ojlzr4KA0DeDOcBxuu1l/kZHeyrkIzves+vX4rJg==
-----END PUBLIC KEY-----`;



 $model = new SpEcKeyPair();
$ecc = new EasyECC('P256');
$privateKey = $ecc->generatePrivateKey();
$publicKey = $privateKey->getPublicKey();

print_r(gettype($ecc->generatePrivateKey()));

$signature = new EccSignatureManager();
$data = 'try to sign message';

$sig = $signature->Sign($data, $privateKey);
print_r($sig);

$ver = $signature->Verify($data, $publicKey, $sig);
print_r($ver); */

$prKey = '-----BEGIN PRIVATE KEY-----
MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQgpIs8tj7kiNV6A8+j
V7+7gWp/IfY2wJpwjxTU6FvzEk+hRANCAARpJ80jUMvH4V1Os77NGdZ3HEBMd9jg
wwooy5l/h2MEuL8a18URu3HpLBV95/GA8LhmobcTOPAF9FrEx8UPqSpH
-----END PRIVATE KEY-----';

$pubKey = '-----BEGIN PUBLIC KEY-----
MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEaSfNI1DLx+FdTrO+zRnWdxxATHfY
4MMKKMuZf4djBLi/GtfFEbtx6SwVfefxgPC4ZqG3EzjwBfRaxMfFD6kqRw==
-----END PUBLIC KEY-----';

$list = new SpCrypto();
// print_r($list->GenerateKeyPair());

$signature = new EccSignatureManager();
$arr = array('amount' => strval(50 + 0), 'description' => 'Test payment');
$data = json_encode($arr);
print_r($data);
$sig = $signature->Sign($data, $prKey);
print_r($sig);

 $ver = $signature->Verify($data, $sig, $pubKey);
//var_dump($ver);
