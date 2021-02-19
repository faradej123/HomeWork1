<?php

return [
    "/" => [
        "GET" => [
            "controller" => "MikhailovIgor\\Controllers\\HomePageController",
            "action" => "showUrls",
        ],
    ],
    "/hw1" => [
        "GET" => [
            "controller" => "MikhailovIgor\\Controllers\\HomeWork1Controller",
            "action" => "showHomeWork",
        ],
    ],
    "/hw2" => [
        "GET" => [
            "controller" => "MikhailovIgor\\Controllers\\HomeWork2Controller",
            "action" => "showHomeWork",
        ],
    ],
];