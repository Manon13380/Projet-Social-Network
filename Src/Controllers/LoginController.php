<?php

class LoginController extends Controller
{
    public function displayPage()
    {
        try {
            if (isset ($_POST["login"])) {
                if (!empty ($_POST["mail"])) {
                    $users = User::getUserByMail($_POST["mail"]);
                    if ($users) {
                        if ($users["password"] == $_POST["password"]) {
                            $_SESSION["userId"] = $users["id"];
                            header("Location:/HomePage");
                        } else {
                            throw new Exception('Mauvais mot de Passe', 1);
                        }
                    } else {
                        throw new Exception("Cet utilisateur n'existe pas !", 2);
                    }
                }
            }
        } catch (PDOException | Exception $e) {
            switch ($e->getCode()) {
                case '1':
                    $errorPasswordIntoDB = $e->getMessage();
                    break;
                case '2':
                    $errorUserIntoDB = $e->getMessage();
                    break;
                default:
                    echo $e->getMessage();
            }
        }
        require (__DIR__ . "/../Views/Login.php");
    }
}
?>