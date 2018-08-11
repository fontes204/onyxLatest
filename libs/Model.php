<?php
    class Model extends Database{
        #code
        function __construct()
        {
            $this->conn = new Database();
        }
    }
    