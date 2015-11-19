<?php
session_start();

$id = $_GET['id'];

if (!empty($id)) {
	unset($_SESSION['products'][$id]);
	if (empty($_SESSION['products'])) {
		unset($_SESSION['products']);
	}
}