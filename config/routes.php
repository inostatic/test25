<?php

return array(
    "" => "article/index/1",
    "([0-9]+)" => "article/index/$1",
    "bytags/([0-9]+)" => "article/bytag/$1/1",
    "article/([0-9]+)" => "article/single/$1",
    "myarticles" => "redactor/articles",
    "myarticles/add" => "redactor/add",
    "myarticles/delete/([0-9]+)" => "redactor/delete/$1",
    "myarticles/delete/tag/([0-9]+)/([0-9]+)" => "redactor/delete_tag/$1/$2",
    "change/([0-9]+)" => "redactor/change/$1",
    "login" => "auth/login",
    "register" => "auth/registration",
    "myprofile" => "Profile/Profile"
);
