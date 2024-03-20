<?php
class HomePageController extends Controller
{
    public function displayPage()
    {
        try {

            //Obtenir l'utilisateur en session
            $UserId = User::getUserById($_SESSION["userId"]);
            //Obtenir tous les posts 
            $postDb = Post::getPosts();
            $posts = [];
            foreach ($postDb as $post) {
                //obtenir l'auteur du post
                $userPost = User::getUserById(($post['author']));
                $posts[] = new Post($post['id'], $post['title'], $post['message'], $post['author']);

                //pour se déconnecter
                if (isset ($_POST['logOut'])) {
                    session_destroy();
                    header("Location:/");
                }

                //Pour supprimer un post
                if (isset ($_POST['delete'])) {
                    Db::getInstance()->beginTransaction();
                    $postDb = Post::getPostByid($_POST['delete']);
                    $postDelete = new Post($postDb['id'], $postDb['title'], $postDb['message'], $postDb['author']);
                    Post::deletePost($postDelete);
                    Db::getInstance()->commit();
                }
                //pour modifier un post
                if (isset ($_POST['confirm'])) {
                    Db::getInstance()->beginTransaction();
                    $postDb = Post::getPostByid($_POST['confirm']);
                    $postUpdate = new Post($postDb['id'], $_POST['newTitle'], $_POST['newMessage'], $postDb['author']);
                    if ($postUpdate->getTitle() != null && $postUpdate->getMessage() != null) {
                        Post::updatePost($postUpdate);
                        Db::getInstance()->commit();
                    }
                }

                //Pour ajouter un post
                if (isset ($_POST['addPost'])) {
                    if (isset ($_POST['title']) && $_POST['content']) {
                        Db::getInstance()->beginTransaction();
                        $newPost = new Post("", $_POST['title'], $_POST["content"], $_SESSION['userId']);
                        if ($newPost->getTitle() != null && $newPost->getMessage() != null) {
                            Post::insertIntoDb($newPost);
                            Db::getInstance()->commit();
                            header("Location:/HomePage");
                        }
                    }
                }
            }
        } catch (PDOException | Exception $e) {
            switch ($e->getCode()) {
                case '1':
                    $errorTitle = $e->getMessage();
                    break;
                case '2':
                    $errorMessage = $e->getMessage();
                    break;
                default:
                    echo $e->getMessage();
            }
        }
        Db::disconnect();
        require (__DIR__ . "/../Views/HomePage.php");
    }
}
?>