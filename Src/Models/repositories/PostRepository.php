<?php
abstract class PostRepository extends Db
{
    private static function request($request)
    {
        $result = self::getInstance()->query($request);
        return $result;
    }

    public static function getPosts()
    {
        return self::request("SELECT * FROM Post ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPostByid($id)
    {
        return self::request("SELECT * FROM Post WHERE id=".$id)->fetch(PDO::FETCH_ASSOC);
    }


    public static function insertIntoDb(Post $post)
    {
        return self::request("INSERT INTO post (title, message, author) VALUES ('" . $post->getTitle() . "', '" . $post->getMessage() . "', '" . $post->getAuthor() . "')");
    }
    public static function updatePost(Post $post)
    {
        return self::request("UPDATE post SET title ='" . $post->getTitle() . "', message='" . $post->getMessage() . "' WHERE id=".$post->getId());
    }
    public static function deletePost(Post $post)
    {
        return self::request("DELETE FROM Post WHERE id =" . $post->getId());
    }
}
?>