<?php

require_once('classes/CRUD.php');
$crud = new CRUD;
$insert = $crud->insert('students', $_POST);