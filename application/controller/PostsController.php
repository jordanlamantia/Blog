<?php

class PostsController extends AppController
{

    protected $nbArt;
    protected $nbPage;
    private $_comment;
    private $_iduser;
    private $_idpost;

    public function __construct()
    {

        require 'application/model/PostsModel.php';

        $this->model = new PostsModel();
        $this->nbArt = $this->model->count_articles();
        $this->nbPage = ceil($this->nbArt["COUNT(idblog_posts)"] / MAX_POSTS);

        parent::__construct();

    }

    /**
     * Retour à la home
     * @internal param $offset
     * @internal param $limite
     */

    public function home()
    {

        if (isset($_GET['p'])) {
            $page = $_GET['p'];
        } else {
            $page = 1;
        }

        $offset = ($page - 1) * MAX_POSTS;

        if ($data = $this->model->readAll(array(
            'table' => 'posts',
            'orderBy' => 'idblog_posts',
            'sort' => 'DESC',
            'limit' => MAX_POSTS,
            'offset' => $offset
        ))
        ) {
            //On définir le titre de la page dans une constante.
            define("TITLE_FOR_LAYOUT", "Les derniers articles");
            $this->load->view('vue_articles.php', $data, $this->nbPage);
        } else {
            define("TITLE_FOR_LAYOUT", "Erreur technique");
            $this->load->view('vue_error.php');
        }
    }

    public function comments()
    {
        $this->_comment = $_POST['comment'];
        $this->_iduser = $_SESSION['user_id'];
        $this->_idpost = $_POST['article_id'];

        if ($this->model->insert_comment($this->_comment, $this->_iduser, $this->_idpost)) {
            header('location: ?module=posts&action=post&id=' . $this->_idpost . '&comment=ok');
            exit;
        } else {
            header('location: ?module=posts&action=post&id=' . $this->_idpost . '&comment=Nok');
            exit;
        }
    }

    /**
     * Affichage des post
     * @param $idArticle
     */

    public function post()
    {
        if (isset($_GET['id'])) {

            if ($data = $this->model->lire_article($_GET["id"])) {

                if ($comments = $this->model->get_comments($_GET["id"])) {

                    //On définir le titre de la page dans une constante.
                    define("TITLE_FOR_LAYOUT", "Article détaillé");
                    $this->load->view('vue_article.php', $data, null, $comments);

                } else {

                    //On définir le titre de la page dans une constante.
                    define("TITLE_FOR_LAYOUT", "Article détaillé");
                    $this->load->view('vue_article.php', $data);

                }

            } else {
                define("TITLE_FOR_LAYOUT", "Erreur technique");
                $this->load->view('vue_error.php');
            }

        } else {
            define("TITLE_FOR_LAYOUT", "Erreur technique");
            $this->load->view('vue_error.php');
        }
    }

    public function deletecomm()
    {
        $idcomment = $_GET['idcomm'];
        $idpost = $_GET['idpost'];

        if ($this->model->delete_comment($idcomment)) {
            header('location: ?module=posts&action=post&id=' . $idpost . '&delcomment=ok');
            exit;
        } else {
            header('location: ?module=posts&action=post&id=' . $idpost . '&delcomment=nok');
            exit;
        }
    }
}
