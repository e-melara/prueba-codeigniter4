<?php
use App\Models\UserModel;
use Config\Services;
use Firebase\JWT\JWT;

function getJWTFromRequest($authenticationHeader): string
{
  if(is_null($authenticationHeader)) {
    throw new Exception('Invalido JWT en la peticion');
  }
  return explode(' ', $authenticationHeader)[1];
}

function validateJWTFromRequest(string $encodedToken) {
  $key = Services::getSecretKey();
  $decodedToken = JWT::decode($encodedToken, $key, ['HS256']);
  $model = new UserModel();
  $model->findUserByEmailAddress($decodedToken->email);
}

function getSignedJWTForUser(string $email) {
  $issuedAtTime = time();
  $tokenTimeToLive = getenv('JWT_TIME_TO_LIVE');
  $tokenExpiration = $issuedAtTime + $tokenTimeToLive;

  $payload = [
    "email" => $email,
    "iat" => $issuedAtTime,
    "exp" => $tokenExpiration
  ];
  
  $jwt = JWT::encode($payload, Services::getSecretKey(), 'HS256');
  return $jwt;
}
?>