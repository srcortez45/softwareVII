<?php
require_once('config.php');
class ModeloCredencialesBD
{
    protected $_db;

    public function __construct()
    {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if ($this->_db->connect_errno) {
            echo "fallo al conectar a la base de datos" . $this->_db->connect_errno;
            return;
        }
    }
}
