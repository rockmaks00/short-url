<?php

Router::route("/", "IndexController@index");

Router::execute($_SERVER['REQUEST_URI']);