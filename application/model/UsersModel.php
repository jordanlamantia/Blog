<?php

class UsersModel extends AppModel
{
    /**
     * Connexion
     * @param $login
     * @param $password
     * @return bool|int
     */

    public function connect($login, $password)
    {
        try {


            //On envoie la requête
            $query = $this->pdo->prepare("SELECT * FROM blog_users
                                    WHERE user_login = :login AND user_pass = :pass");

            //On initialise les paramètres
            $query->bindParam(':login', $login, PDO::PARAM_INT);
            $query->bindParam(':pass', $password, PDO::PARAM_INT);

            $query->execute();

            $result = $query->fetch();

            $connect = $query->rowCount();

            if ($connect == 1) {

                $_SESSION["login"] = true;
                $_SESSION["user_login"] = $result["user_login"];
                $_SESSION['user_id'] = $result['iduser'];
                return 1;

            } else {
                $_SESSION["login"] = false;
                return 0;
            }

            return true;

        } catch (Exception $e) {
            return false;
        }

    }
}
