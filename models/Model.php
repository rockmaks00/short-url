<?php
class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::db_connect();
    }

    public function query($query, $params = null)
    {
        $result = null;
        if (isset($params)) {
            $result = pg_query_params($this->db, $query, $params);
        } else {
            $result = pg_query($this->db, $query);
        }
        return pg_fetch_all($result);
    }
}