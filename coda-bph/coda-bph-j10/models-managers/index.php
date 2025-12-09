<?php

require "config/autoload.php";

$router = new Router();
$router->handleRequest();

$user_manager = new UserManager;

$robin=new User("robin0", "robin1", "email", "password", new DateTime("2025-12-04 10:31:00"), 32);

$user_manager->create($robin);

var_dump($robin);

$robin->setFirstName("robi");

$user_manager->update($robin);

var_dump($robin);

$user_manager->delete($robin);

var_dump($robin);

var_dump($user_manager->findOne(2));

var_dump($user_manager->findAll());