<?php

namespace app\utils;

class ImageUploader
{

    // https://www.w3schools.com/php/php_file_upload.asp
    // https://www.simplilearn.com/tutorials/php-tutorial/image-upload-in-php
    // https://makitweb.com/upload-and-store-an-image-in-the-database-with-php/

    private $uploads_folder = "/uploads/";
    private $public_folder =  __DIR__ . "/../public";

    private $target_dir;
    private $extensions = array("jpg", "jpeg", "png", "gif");
    private $file_name;
    private $file_size;
    private $file_tmp;
    // private $file_type;
    private $target_file;
    private $file_ext;

    public function __construct($file)
    {
        // $file = $_FILES['image'];
        $this->file_name = $file['name'];
        $this->file_size = $file['size'];
        $this->file_tmp = $file['tmp_name'];
        // $this->file_type = $file['type'];
        $this->target_file = $this->target_dir . basename($file["name"]);
        $this->file_ext = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));
    }

    public function validateImage()
    {
        if ($this->file_size > 2097152) {
            return 'File size must be less than 2 MB.';
        }
        // // https://stackoverflow.com/questions/7959615/filesfilesize-returning-0
        // if ($this->file_size < 1) {
        //     return 'File required.';
        // }
        if (!in_array($this->file_ext, $this->extensions)) {
            return 'Image type not allowed.';
        }
        if (strlen($this->file_name) > 50) {
            return 'File name too long.';
        }
    }

    public function uploadImage($prefix = "")
    {
        $path = $this->uploads_folder . $prefix . date("DMdYG:i", time()) . $this->file_name;

        move_uploaded_file($this->file_tmp, $this->public_folder . $path);

        return $path;
    }
}