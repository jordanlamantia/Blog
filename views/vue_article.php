<?php include_once "layout/header.php" ?>
<div class="jumbotron">
    <div class="container">
        <?php

        foreach ($data as $article) {
            echo "<h1 class='text-center'>" . $article['post_title'] . '</h1>';
            echo "<br/>";
            echo "<h3>Date : " . $article['post_date'] . '</h3>';
            echo "<p><strong>Contenu : </strong>" . $article['post_contenu'] . "</p>";
        }
        ?>
        </br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($comments !== null) {

                    echo "</br><h4>Les derniers commentaires : </h4>";

                    foreach ($comments as $comment) {
                        if(isset($_SESSION['user_login']))
                        {
                            if ($comment['blog_users_idblog_users'] == $_SESSION['user_id']) {
                                echo "<ul>";
                                echo "<li><p>".$comment['comment']." <a onclick='return confirm(\"Voulez-vous supprimer votre commentaire ?\")' href='?module=posts&action=deletecomm&idpost=".$_GET['id']."&idcomm=".$comment['idblog_comments']."'<button type=\"button\" class=\"btn btn-primary btn-xs\">supprimer</button></a></p></li>";
                                echo "</ul>";
                            } else {
                                echo "<ul>";
                                echo "<li><p>".$comment['comment']."</p></li>";
                                echo "</ul>";
                            }
                        } else {
                            echo "<ul>";
                            echo "<li><p>".$comment['comment']."</p></li>";
                            echo "</ul>";
                        }
                    }

                } else {

                    echo "</br><h4>Il n'y à aucun commentaire pour le moment.</h4></br>";

                }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <form method="post" action="?module=posts&amp;action=comments" class="col-sm-12">
                <div class="form-group">
                    <label for="commentaire">Commentez cet article</label>
                    </br>
                    <?php
                    if (isset($_SESSION['login'])) {
                        ?>
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                        <input type="hidden" name="article_id" value="<?= $_GET['id']; ?>">
                        </br>
                        <button type="submit" class="btn btn-default">Commenter</button>
                        <?php

                    } else {
                        ?>
                        <textarea name="comment" class="form-control" rows="3" placeholder="Pour pouvoir commentez cet article connecte toi !" disabled></textarea>
                        </br>
                        <button type="submit" class="btn btn-default" disabled>Commenter</button>
                        <?php
                    }
                    ?>

                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once "layout/footer.php" ?>
