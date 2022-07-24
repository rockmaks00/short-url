<?php

const ROOT = "D:/OpenServer/domains/short-url";
const CONTROLLER_PATH = ROOT . "/controllers/";
const MODEL_PATH = ROOT . "/models/";
const VIEW_PATH = ROOT . "/views/";
const ROUTE_PATH = ROOT . "/routes/";

require_once "db.php";
require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';
require_once CONTROLLER_PATH . 'Controller.php';
require_once ROUTE_PATH . "Router.php";
require_once ROUTE_PATH . "web.php";