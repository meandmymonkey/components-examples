<?php

namespace Demo;

class ArticleRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
