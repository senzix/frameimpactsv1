<?php
class Router
{
    private $routes = [];

    public function addRoute($path, $callback, $methods = ['GET'])
    {
        $methods = (array) $methods; // Ensure $methods is always an array
        foreach ($methods as $method) {
            $this->routes[] = [
                'path' => rtrim($path, '/'),
                'callback' => $callback,
                'method' => strtoupper($method),
            ];
        }
    }

    public function dispatch($uri, $requestMethod) {
        $uri = rtrim(parse_url($uri, PHP_URL_PATH), '/');
        $requestMethod = strtoupper($requestMethod);

        // Handle newsletter subscription separately
        if ($requestMethod === 'POST' && isset($_POST['newsletter_email'])) {
            $this->handleNewsletterSubscription();
            return;
        }

        foreach ($this->routes as $route) {
            if ($route['path'] === $uri && $route['method'] === $requestMethod) {
                if (is_callable($route['callback'])) {
                    call_user_func($route['callback']);
                } else {
                    require $route['callback'];
                }
                return;
            }
        }

        $this->handleNotFound();
    }

    private function handleNewsletterSubscription()
    {
        $config = require 'config.php';
        $db = new Database($config['database']);
        $message = '';
        $messageClass = '';
        
        if (isset($_POST['newsletter_email'])) {
            $email = filter_var($_POST['newsletter_email'], FILTER_SANITIZE_EMAIL);
            

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Check if email already exists
                $checkQuery = "SELECT COUNT(*) FROM newsletter_subscribers WHERE email = ?";
                $emailExists = $db->query($checkQuery, [$email])->fetchColumn() > 0;

                if ($emailExists) {
                    $message = 'You are already subscribed!';
                    $messageClass = 'alert-warning';
                } else {
                    $query = "INSERT INTO newsletter_subscribers (email, created_at) VALUES (?, NOW())";
                    $result = $db->query($query, [$email]);

                    if ($result) {
                        $message = 'Thank you for subscribing!';
                        $messageClass = 'alert-success';
                    } else {
                        $message = 'Error: Unable to subscribe. Please try again later.';
                        $messageClass = 'alert-danger';
                    }
                }
            } else {
                $message = 'Error: Invalid email address.';
                $messageClass = 'alert-danger';
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['message' => $message, 'messageClass' => $messageClass]);
        exit;
    }

    private function handleNotFound()
    {
        require 'views/404.php';
    }
}

// Create a new router instance
$router = new Router();

// Register your routes with the specified mappings
$router->addRoute('/', 'controllers/index.php');
$router->addRoute('/aboutus', 'controllers/aboutus.php');
$router->addRoute('/industry', 'controllers/industry.php');
$router->addRoute('/proneurship', 'controllers/proneurship.php');
$router->addRoute('/our-team', 'controllers/our-team.php');
$router->addRoute('/articles', 'controllers/articles.php');
$router->addRoute('/post', 'controllers/post.php', ['GET', 'POST']);
$router->addRoute('/contact', 'controllers/contactus.php', ['GET', 'POST']);
$router->addRoute('/classroom', 'controllers/classroom.php', ['GET', 'POST']);
$router->addRoute('/login', 'controllers/login.php', ['GET', 'POST']);
$router->addRoute('/register', 'controllers/register.php',['GET','POST']);
$router->addRoute('/psychometric-test', 'controllers/psychometric-test.php',['GET','POST']);
$router->addRoute('/test_user_details', 'controllers/test_user_details.php',['GET','POST']);
// Logout route
$router->addRoute('/logout','controllers/logout.php', ['GET']);

// Admin route
$router->addRoute('/adminlogin', 'controllers/adminlogin.php',['GET','POST']);
$router->addRoute('/admin','controllers/admin.php',['GET','POST']);

// Dispatch the current request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);