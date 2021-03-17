<?php
namespace App\Models;

interface ResponseStatus
{
const OK = 200; // Pour accéder à la constante OK de l’interface ResponseStatus il suffit d’écrire ResponseStatus ::OK
const CREATED = 201;
const NO_CONTENT = 204;
const PARTIAL_CONTENT = 206;
const BAD_REQUEST = 400;
const UNAUTORIZED = 401;
const FORBIDEN = 403;
const NOT_FOUND = 404;
const INTERNAL_ERROR = 500;
const UNAVAILABLE = 503;
}