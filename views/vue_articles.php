<?php include_once "layout/header.php" ?>

<div class="jumbotron">
    <div class="container">
        <h1 class="text-center">Les derniers articles du blog</h1>
        </br>
        <?php
        foreach ($data as $article) {
            echo "<div>";
           /* echo "<h2>Titre : <a href='?module=posts&amp;action=post&amp;id=" . $article['idblog_posts'] . "'>"
                . $article['post_title'] . "</a></h2>";*/
            ?>

            <h2>Titre : <a href="posts/post/<?= format_url($article['post_title']) ."-". $article['idblog_posts'] ?>"><?= $article['post_title'] ?></a></h2>

            <?php
            echo "<h3>Date : " . $article['post_date'] . '</h3>';
            echo "<p><strong>Contenu : </strong>" . $article['post_contenu'] . "</p>";
            echo "</div></br>";
        }
        ?>

        <nav class="text-center">
            <ul class="pagination pagination-lg">
                <?php
                for($i=1; $i<=$nbPage; $i++)
                {
                    echo "<li class='activate'><a href='?module=posts&amp;action=home&amp;p=".$i."'>$i</a></li>";

                } ?>
            </ul>
        </nav>

    </div>
</div>

<?php include_once "layout/footer.php" ?>
