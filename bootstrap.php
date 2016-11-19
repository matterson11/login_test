<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'test.db';
$salt = "FOaflFaD";
$dbconfig = mysqli_connect($host,$username,$password,$database);

//adam:foo
//mark:bar
//peter:baz

/* Creating Users Table

$query = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)";
*/

/* Creating table of login attempts

$query = "CREATE TABLE login_attempt (
    user_id INT(6) NOT NULL,
    attempt_at datetime NOT NULL
    )";
*/

/* Creating Accounts table

$query = "CREATE TABLE accounts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL)";
*/

/* Create account_user table

Interface table between users and their assigned accounts

$query = "CREATE TABLE account_user (
account_id INT(6) NOT NULL, 
user_id INT(6) NOT NULL)";
*/

