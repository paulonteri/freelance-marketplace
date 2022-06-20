<?php

namespace app;

class Settings
{
    public string $host = 'https://freelance-tmp-2.paulonteri.com';

    public function __construct()
    {
        $this->db = $this->host = getenv("HOST_URL") ? getenv("HOST_URL") : 'https://freelance-tmp-2.paulonteri.com';
    }
}