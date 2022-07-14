<?php

class config
{
    private $host;
    private $user;
    private $pass;
    private $dbname;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'scandiweb_task';
        $this->user = 'root';
        $this->pass = '';
    }
	
}
