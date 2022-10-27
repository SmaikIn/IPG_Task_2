<?php

class Model
{
    static function getQuery($token, $department_id, $connect)
    {
        if ($department_id === 0) {
            $response = $connect->prepare("SELECT company.company_name, users.name,users.phone, users.email FROM bundle 
            INNER JOIN users on users.id = bundle.id_users 
            INNER JOIN company on company.id = bundle.id_company 
            INNER JOIN department on department.id = bundle.id_department 
            WHERE company.company_token = ?");
            $response->bind_param("s", $token);
        } else {
            $response = $connect->prepare("SELECT company.company_name, users.name,users.phone, users.email FROM bundle 
            INNER JOIN users on users.id = bundle.id_users 
            INNER JOIN company on company.id = bundle.id_company 
            INNER JOIN department on department.id = bundle.id_department 
            WHERE company.company_token = ? AND department.id = ? ");
            $response->bind_param("si", $token, $department_id);
        }
        $response->execute();
        $result = $response->get_result();
        $row = $result->fetch_all();

        if (empty($row)) {
            return 0;
        } else {
            return $row;
        }
    }
}