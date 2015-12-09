<?php

Class Core
{
    public function view($file_name, $data = null)
    {
        include 'views/' . $file_name;
    }
}