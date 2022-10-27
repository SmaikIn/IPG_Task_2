<?php

class Api
{
    static function getData($token, $department_id, $connect)
    {
        $response = Model::getQuery($token, $department_id, $connect);
        return $response;
    }
}




