<?php

class UrlModel extends Model
{
    public function create_url($url, $short)
    {
        $query = "INSERT INTO public.urls (url, short) VALUES ($1, $2);";
        return $this->query($query, array($url, $short));
    }

    public function get_url($short)
    {
        $query = "SELECT * FROM public.urls WHERE short=$1;";
        return $this->query($query, array($short));
    }
}