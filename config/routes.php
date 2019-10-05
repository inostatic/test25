<?php

return array(
    "" => "article/index",
    "article/([0-9]+)" => "article/single/$1",
    "myarticles" => "redactor/articles",
    "myarticles/add" => "redactor/add",
    "myarticles/delete/([0-9]+)" => "redactor/delete/$1",
    "login" => "auth/login",
    "register" => "auth/registration"
);
