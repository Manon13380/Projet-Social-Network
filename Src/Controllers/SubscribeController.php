<?php
class SubscribeController extends Controller
{
    public function displayPage()
    {
        try {
            if (isset ($_POST['name']) && isset ($_POST['firstname']) && isset ($_POST['mail']) && isset ($_POST['password'])) {
                Db::getInstance()->beginTransaction();
                $newUser = new User($_POST['name'], $_POST['firstname'], $_POST['password'], $_POST['mail']);
                if ($newUser->getName() != null && $newUser->getFirstname() != null && $newUser->getPassword() != null && $newUser->getMail() != null) {
                    User::insertIntoDb($newUser);
                    Db::getInstance()->commit();
                    header("Location:/");
                }
            }


        } catch (PDOException | Exception $e) {
            switch ($e->getCode()) {
                case '1':
                    $errorName = $e->getMessage();
                    break;
                case '2':
                    $errorFirstname = $e->getMessage();
                    break;

                case '3':
                    $errorPassword = $e->getMessage();
                    break;

                case '4':
                    $errorMail = $e->getMessage();
                    break;
                default:
                    echo $e->getMessage();
            }
            Db::getInstance()->rollBack();

        }
        Db::disconnect();
        require (__DIR__ . "/../Views/Subscribe.php");
    }
}
?>