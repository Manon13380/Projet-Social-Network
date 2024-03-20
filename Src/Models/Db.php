<?php
class Db
{
    private static $instance;
    public static function getInstance()
    {
        try {
            if (self::$instance == null) {
                self::$instance = new PDO("mysql:host=localhost; dbname=projet_social_network", "root", "root");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
        return self::$instance;
    }
    public static function disconnect()
    {
        self::$instance = null;
    }
}