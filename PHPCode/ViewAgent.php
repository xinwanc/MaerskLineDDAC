<?php
require_once 'Paginator.php';

$limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 5; 
$page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
$links = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 7; 

$query = "Select* from agent ORDER BY FirstName";
$paginator = new Paginator($loginconnect, $query);
$results = $paginator->getData($limit, $page);
