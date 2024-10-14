<?php 

require 'functions.php';
require 'database.php';
require 'router.php';



/* practice
$uri=parse_url($_SERVER['REQUEST_URI'])['path'];
$routes=[
    '/'=>'controllers/index.php',
    '/aboutus'=>'controllers/aboutus.php',
    '/capacitybuilding'=>'controllers/capacitybuilding.php',
    '/proneurship'=>'controllers/proneurship.php',
    '/our-team'=>'controllers/our-team.php',
    '/ourwork'=>'controllers/ourwork.php',
    '/contact'=>'controllers/contactus.php',
];
if(array_key_exists($uri,$routes)){
    require $routes[$uri];
}else {
    echo 'not found';
}
*/

/*class person{
    public $id;
    public $name;

    public function breathe(){
echo $this->name.' is breathing';
    }
}
$person=new person();
$person->id=1;
$person->name='josh';

$person->breathe();*/