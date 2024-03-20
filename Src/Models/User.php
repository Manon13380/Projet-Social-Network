<?php
class User extends UserRepository
{
    private $id;
    private $name;

    private $firstName;
    private $password;
    private $mail;
    public function __construct($name, $firstName, $password, $mail)
    {
        $this->setName($name);
        $this->setFirstname($firstName);
        $this->setPassword($password);
        $this->setMail($mail);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        if (preg_match("/^[A-Za-z\- ]{2,}$/", $name)) {
            return $this->name = htmlspecialchars($name);
        } else {
            throw new Exception("Veuillez rentrer un nom valide", 1);

        }

    }
    public function getFirstname()
    {
        return $this->firstName;
    }
    public function setFirstname($firstName)
    {
        if (preg_match("/^[A-Za-z\- ]{2,}$/", $firstName)) {
            return $this->firstName = htmlspecialchars($firstName);
        } else {
            throw new Exception('Veuillez rentrer un prénom valide', 2);

        }

    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        if (preg_match("/^[A-z0-9\-\/]{8,}$/", $password)) {
            return $this->password = htmlspecialchars($password);
        } else {
            throw new Exception('Veuillez rentrer un mot de passe valide', 3);
        }

    }
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        if (preg_match("/^[a-z0-9\_\%]+[\.+@+^[A-z0-9\-]+\.[a-z]{2,}$/", $mail)) {
            $this->mail = htmlspecialchars($mail);
        } else {
            throw new Exception('Veuillez rentrer un mail valide', 4);
        }

    }
}
?>