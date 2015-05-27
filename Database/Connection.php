<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 27/05/2015
 * Time: 17:53
 */

namespace Database;


class Connection {

    private $db_name;
    private $db_user;
    private $db_pwd;
    private $uniqid;

    public  function  __construct($db_name,$db_user,$db_pwd){

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;
        $this->uniqid = uniqid();
    }

}