<?php

Class CoreView extends Core
{
    public function view($file_name, $data = null, $nbPage = null, $comments = null)
    {
        include 'views/' . $file_name;
    }

    public function helpHtmlLink($options)
    {
        echo "<a href='".$options["module"]. "/"
            .$options["action"]. "/"
            .format_url($options["seotext"])
            . "-" . $options["id"] ."'>".$options["titre"]."</a>";
    }
}