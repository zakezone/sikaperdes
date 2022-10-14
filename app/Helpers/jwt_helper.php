<?php

use App\Models\Api\Api_key_model;
use Config\Services;
use Firebase\JWT\JWT;

function getJWT($otentikasiHeader)
{
    if (is_null($otentikasiHeader)) {
        throw new Exception('Anda tidak memiliki hak akses');
    }
    return explode(' ', $otentikasiHeader)[1];
}

function validateJWT($encodedToken)
{
    $key = Services::getSecretKey();
    $decodedToken = JWT::decode($encodedToken, $key, ['HS256']);
    $model = new Api_key_model();
    $model->getEmail($decodedToken->email);
}

function createJWT($email)
{
    $waktuRequest = time();
    $waktuToken = getenv('JWT_TIME_TO_LIVE');
    $waktuExpired = $waktuRequest + $waktuToken;
    $payload = [
        'email' => $email,
        'iat' => $waktuRequest,
        'exp' => $waktuExpired
    ];
    $jwt = JWT::encode($payload, Services::getSecretKey());
    return $jwt;
}
