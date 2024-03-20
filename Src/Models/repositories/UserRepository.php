<?php
abstract class UserRepository extends Db
{
    private static function request($request)
    {
        return self::getInstance()->query($request);
    }
    public static function getUserByMail($mail)
    {
        return self::request("SELECT * FROM user WHERE mail= '$mail'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserById($id)
    {
        return self::request("SELECT * FROM user WHERE id= $id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertIntoDb(User $user)
    {
        return self::request("INSERT INTO user(name, firstname, password, mail) VALUES ('" . $user->getName() . "', '" . $user->getFirstname() . "', '" . $user->getPassword() . "', '" . $user->getMail() . "')");
    }
}
?>