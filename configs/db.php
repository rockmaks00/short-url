<?php
class DB {
    const USER = "postgres";
    const PASSWORD = "postgres";
    const HOST = "localhost";
    const PORT = "5432";
    const DB_NAME = "urls";

    public static function db_connect() {
        $user = self::USER;
        $pass = self::PASSWORD;
        $host = self::HOST;
        $port = self::PORT;
        $db = self::DB_NAME;

        return pg_connect("host=$host port=$port dbname=$db user=$user password=$pass");
    }
}