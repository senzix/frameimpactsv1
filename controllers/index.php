<?php
$header = "Home";

$config = require 'config.php';
$db = new Database($config['database']);

$sliderItems = [
    [
        'image' => 'img/slider/ebcc.jpg',
        'heading' => 'Elevate Your Business<br> Thinking With Us',
        'buttonText' => 'GET IN TOUCH',
        'buttonLink' => '/proneurship'
    ],
    [
        'image' => 'img/slider/ebcc.jpg',
        'heading' => 'Consult your Business',
        'buttonText' => 'More Detail',
        'buttonLink' => '/industry?p_id=business'
    ],
    [
        'image' => 'img/slider/ebcc.jpg',
        'heading' => 'Consult about your social impacts',
        'buttonText' => 'More Detail',
        'buttonLink' => '/industry?p_id=social'
    ],
    [
        'image' => 'img/slider/ebcc.jpg',
        'heading' => 'Consult about your health care',
        'buttonText' => 'More Detail',
        'buttonLink' => '/industry?p_id=health'
    ],
    // Add more slider items as needed
];

$services = [
    [
        'icon' => 'fas fa-plane-departure',
        'title' => 'Catalysts for Social Transformation',
        'description' => 'We design holistic social impact strategies that align with your organization\'s mission, driving measurable and sustainable change. Our approach combines local insights from Northeast India with global best practices, ensuring that each initiative fosters lasting community benefits and societal progress.'
    ],
    [
        'icon' => 'fas fa-chart-line',
        'title' => 'Empowering Business Evolution',
        'description' => 'Our consulting services focus on unlocking growth and optimizing efficiency across enterprises, whether they are emerging startups or established organizations. We offer strategic guidance in financial management, market expansion, and overall transformation, helping businesses scale sustainably and achieve their long-term vision for success.'
    ],
    [
        'icon' => 'fas fa-luggage-cart',
        'title' => 'Revolutionizing Healthcare Excellence',
        'description' => 'In a rapidly evolving healthcare landscape, we provide specialized consulting services that enhance operational efficiency and elevate patient care. By streamlining processes, adopting innovative technologies, and ensuring regulatory compliance, we empower healthcare organizations to deliver better, more efficient care to their communities.'
    ],
    [
        'icon' => 'fas fa-bullhorn',
        'title' => 'Insight-Driven Decision-Making',
        'description' => 'Harnessing the power of data is key to maximizing impact. Our expertise enables organizations to transform information into actionable insights, enhancing program effectiveness and facilitating informed decision-making. We prioritize transparency and accountability, ensuring that your initiatives deliver real, measurable results.'
    ],
    [
        'icon' => 'fas fa-leaf',
        'title' => 'Sustainable Futures: Leading with Purpose',
        'description' => 'We guide organizations toward responsible and sustainable growth, helping them implement environmentally sound practices that meet modern sustainability standards. Our consulting encompasses energy management and environmental compliance, ensuring that your business contributes positively to both the bottom line and the planet.'
    ],
    [
        'icon' => 'fas fa-users',
        'title' => 'Empowering Leaders for Tomorrow',
        'description' => 'Our capacity-building programs are tailored to strengthen leadership and foster resilience within organizations. We empower teams with the skills and strategic knowledge to lead impactful projects, driving organizational growth and ensuring long-term adaptability in an ever-changing business landscape.'
    ]
];

// Fetch the 4 most recent blog posts
$recentPosts = $db->query('SELECT * FROM blogs ORDER BY created_at DESC LIMIT 4')->fetchAll();

require "views/index.view.php";
