<?php

namespace app;

class Settings
{
    public static string $host = getenv("HOST_URL") ? getenv("HOST_URL") : 'https://freelance-tmp.paulonteri.com';
}