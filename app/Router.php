<?php
namespace App;
class Router
{


    public function __construct()
    {

    }

    public static function validateUrl($path,$ControllerMethod){
        $pattern = '';
        $variables = [];
        $indexUrl = $_GET['url'] == 'index.php' ? ['/'] : explode('/', ltrim($_GET['url'],'/'));
        $urlSorted = $_GET['url'] == 'index.php' ? '/': '/'.$_GET['url'];
        if($path == '/'){
            $pattern = '/^\/$/';
        }
        elseif (preg_match('/^\/uploads/',$urlSorted)){
            $ext = explode('.',$urlSorted);
            header("Content-Type:image/".$ext[count($ext)-1]);
            readfile('../public/'.$urlSorted);
        }
        else{
            foreach (explode('/',$path) as $order => $url){
                if(preg_match('/.*\{.*\}.*/',$url)){
                    if(array_key_exists($order, $indexUrl)){
                        $variables[] = $indexUrl[$order];
                    }
                    $pattern .= "\/((.+?))";
                }else{
                    $pattern .= "\/$url";
                }
            }
            $pattern = substr($pattern, 2);
            $pattern = '/^\/'.$pattern.'$/';
        }
        if(preg_match($pattern, $urlSorted)){
            $class = new $ControllerMethod[0];
            $method = $ControllerMethod[1];
            if(method_exists($class,$method)){
                call_user_func_array([$class,$method],$variables);
                exit();
            }else{
                throw new \ErrorException("Method $ControllerMethod[1] doesnt exist in $ControllerMethod[0] class",'404',1);
            }
        }
    }

    public static function get($path, $ControllerMethod)
    {
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            return self::validateUrl($path,$ControllerMethod);
        }
    }

    public static function post($path, $ControllerMethod)
    {
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            return self::validateUrl($path,$ControllerMethod);
        }
    }

    public static function put($path, $ControllerMethod)
    {
        if($_SERVER['REQUEST_METHOD'] == "PUT"){
            return self::validateUrl($path,$ControllerMethod);
        }
    }

    public static function delete($path, $ControllerMethod)
    {
        if($_SERVER['REQUEST_METHOD'] == "DELETE"){
            return self::validateUrl($path,$ControllerMethod);
        }
    }


}