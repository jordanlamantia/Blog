<?php

class PostsModel extends AppModel
{
    public function count_articles()
    {
        try {
            //On envoie la requête
            $query = $this->pdo->prepare("SELECT COUNT(idblog_posts) FROM blog_posts");

            $query->execute();

            $nbArt = $query->fetch(PDO::FETCH_ASSOC);

            $query->closeCursor();

            return $nbArt;

        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Lire Article
     * @param $idArticle
     * @return array|bool
     */

    public function lire_article($idArticle)
    {
        try {

            //On envoie la requête
            $query = $this->pdo->prepare("SELECT * FROM blog_posts
                                        WHERE idblog_posts = :id");

            //On initialise les paramètres
            $query->bindParam(':id', $idArticle, PDO::PARAM_INT);

            //On execute la requête
            $query->execute();

            //On récupère tout les résultats
            $article = $query->fetchAll();

            //Close cursor (toujours avant le return)
            $query->closeCursor();

            //On retourne les résultats
            return $article;

        } catch (Exception $e) {
            return false;
        }
    }

    public function insert_comment($comment, $iduser, $idpost)
    {
        try {

            $query = $this->pdo->prepare("INSERT INTO blog_comments
                                        (comment, blog_users_idblog_users, blog_posts_idblog_posts)
                                         VALUES (:comment, :user_id, :post_id)");

            $query->bindValue(':comment', $comment, PDO::PARAM_STR);
            $query->bindValue(':user_id', $iduser, PDO::PARAM_INT);
            $query->bindValue(':post_id', $idpost, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function delete_comment($idcomment)
    {
        try {

            $query = $this->pdo->prepare("DELETE FROM blog_comments WHERE idblog_comments = :id");

            $query->bindValue(':id', $idcomment, PDO::PARAM_INT);

            $query->execute();

            return true;

        } catch (Exception $e) {
            return false;
        }

    }

    public function get_comments($idpost)
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM blog_comments WHERE blog_posts_idblog_posts = :id");

            $query->bindValue(':id', $idpost, PDO::PARAM_INT);

            $query->execute();

            $comments = $query->fetchAll();

            $query->closeCursor();

            return $comments;

        } catch (Exception $e) {
            return false;
        }
    }
}
