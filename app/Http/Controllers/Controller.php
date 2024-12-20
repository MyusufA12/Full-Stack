<?php

namespace App\Http\Controllers;
use OpenApi\Attributes as OA;

#[
    OA\info(version: "1.0.0", description: "Fusion Center Documentation", title: "Fusion Ceter Documentation"),
    OA\Server(url: 'http://praktikum-1.test/api', description: "local server"),
    OA\Server(url: 'http://staging.example.com', description: "staging server"),
    OA\Server(url: 'http://example.com', description: "production server"),
    OA\SecurityScheme(securityScheme: 'bearerAuth', type: "http", name:"Authorization", in: "header", scheme: "bearer"),
    
]
abstract class Controller
{
    //
}
