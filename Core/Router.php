<?php
class Router
{
    public function start()
    {
        $url = $_SERVER['REQUEST_URI'];

        if ($url === "/HomePage") {
            $isAuthenticated = $this->checkAuthentication();
            if (!$isAuthenticated) {
                header("Location: /");
            }
        }
        if ($url !== "/") {
            $controller = ucfirst(explode("/", $url)[1]) . "Controller";
            if (class_exists($controller)) {
                $controllerObjet = new $controller();
                if (method_exists($controllerObjet, "displayPage"))
                    $controllerObjet->displayPage();
                else
                    throw new Exception("Aucune méthode displayPage définie dans la classe $controllerObjet");
            } else {
                http_response_code(404);
                require_once(__DIR__ . "/../Src/Views/error_404.php");
            }
        } else {
            $controllerObjet = new LoginController;
            $controllerObjet->displayPage();
        }
    }
    public function checkAuthentication()
    {
        if (isset($_SESSION['userId']))
            return true;
        else
            return false;
    }
}
?>