<?php 

namespace myfrm;

class Router {
  protected $routes=[];
  protected $uri;
  protected $method;
  public static array $route_params = [];

  public function __construct()
  {
    $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], "/");

    $this->method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; //contains only GET or POST methods
  }

   public function match() {
    $matches = [];

    foreach($this->routes as $route) {
      
      if((preg_match("#^{$route['uri']}$#", $this->uri, $matches)) && (($route['method']) === strtoupper($this->method))) {

        if($route['middleware']) {
          $middleware = MIDDLEWARE[$route['middleware']] ?? false;
    
          if(!$middleware) {
            throw new \Exception("Incorrect middleware {$route['middleware']}");
          }
          (new $middleware)->handle();
        } 
        
        foreach($matches as $k => $v) {
          if(is_string($k)) {
            self::$route_params[$k] = $v;
          }
        }

        require CONTROLLERS . "/{$route['controller']}";
        $matches = true;
        break;
      }
    }
      

      // if(($route['uri'] === $this->uri) && ($route['method']) === strtoupper($this->method)) {

      //                       // if($route['middleware'] == 'guest') {
      //                       //   if(check_auth()) {
      //                       //     redirect('/index.php');
      //                       //   }
      //                       // }

      //                       // if($route['middleware'] == 'auth') {
      //                       //   if(!check_auth()) {
      //                       //     redirect('/php-practicr/register');
      //                       //   }
      //                       // }

        // require CONTROLLERS . "/{$route['controller']}";
        // $matches = true;
        // break;
    // }
   //}

    // if(!$matces) {
    //   abort(500, '500 - Server Error');
    // }
  }

  public function only($middleware) {
      // dump($this->routes);
      // dump($middleware);
      // dump(count($this->routes) - 1);
      //dump(array_key_last($this->routes));

      $this->routes[array_key_last($this->routes)]['middleware'] = $middleware;
      return $this;
    }
  
  public function add($uri, $controller, $method) {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null,
    ];
    
    return $this;
  }
  
  public function get($uri, $controller) {
    return $this->add($uri, $controller, 'GET');
  }
  
  public function post($uri, $controller) {
    return $this->add($uri, $controller, 'POST');
  }
  
  public function delete($uri, $controller) {
    return $this->add($uri, $controller, 'DELETE');
  }
  
}