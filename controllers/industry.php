<?php

function getIndustryName($key)
{
    $industries = [
        'social' => 'Social Impact Management Consulting',
        'health' => 'Health Operations Management Consulting',
        'business' => 'Business Management Consulting',
        // Add more industries as needed
    ];

    return $industries[$key] ?? 'Industry';
}

function getIndustryData()
{
    return [
        'business' => [
            'name' => 'Business Management Consulting',
            'description' => 'At Frame Impacts, we unlock the full potential of businesses by developing innovative strategies that
                drive growth, enhance operational efficiency, and secure long-term sustainability. Our business
                consultants collaborate with organizations to deliver customized solutions that address their unique
                challenges while fostering innovation and market competitiveness.'
        ],
        'health' => [
            'name' => 'Health Management Consulting',
            'description' => 'Frame Impacts is committed to transforming healthcare systems by driving efficiency, improving patient
                outcomes, and fostering sustainable growth. Our healthcare consultants collaborate with organizations to
                implement innovative, data-driven solutions that enhance service delivery and streamline operations.'
        ],
        'social' => [
            'name' => 'Social Impact Management Consulting',
            'description' => 'We believe in the power of strategic innovation to create meaningful social change. Our consultants
                partner with organizations to develop sustainable, impactful solutions that benefit communities while
                driving long-term economic and environmental success.'
        ],
       
       
        // Add more industries as needed
    ];
}

if (isset($_GET['p_id'])) {
    $key = $_GET['p_id'];
    $validKeys = ['social', 'health', 'business']; // Add all valid keys here

    if (in_array($key, $validKeys)) {
        $name = getIndustryName($key);
        $header = $name;
        require "views/industry/{$key}.php";
    } else {
        // Handle invalid key (e.g., show 404 page)
        require "views/404.php";
    }
} else {
    $header = "Industry";
    require "views/industry.view.php";
}