<?php

Class CoreModel extends Core
{
    protected $pdo;

    public function __construct()
    {
        try {
            $dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $this->pdo = @new PDO($dns, DB_LOGIN, DB_PASSWORD, $options);
        } catch (Exception $e) {
            die('Problème connexion');
        }
    }

    public function readAll($options)
    {
        try {

            //requête
            $query = "SELECT ";

            //traitement des données
            if(isset($options['columns'])){
                $query .= $options['columns'];
            } else {
                $query .= "*";
            }

            $query .= " FROM " . PREFIXE . $options['table'];

            if(isset($options['orderBy'])){

                $query .= " order by " . $options['orderBy'];

                if(isset($options['sort'])) {
                    $query .= " " . $options['sort'];
                }
            }

            if(isset($options['limit']) && isset($options['offset'])){
                $query .= " limit " . $options['offset'] . "," .$options['limit'];
            }


            $results = $this->pdo->query($query);

            $datas = $results->fetchAll();

            $results->closeCursor();

            return $datas;


        } catch (Exception $e) {
            return ($e->getMessage());
        }
    }
}