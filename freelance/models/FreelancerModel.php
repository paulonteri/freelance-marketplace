<?php

namespace app\models;

use app\Database;

class FreelancerModel extends Database
{
    private $db;

    private int $id;
    private string $title;
    private string $description;
    private int $user_id;
    private int $years_of_experience;
    private $time_created;
    private int $is_active;
    private UserModel $user;


    public function __construct($id = null)
    {
        $this->db = $this->connectToDb();

        if ($id != null) {

            $sql = 'SELECT * FROM freelancer WHERE id = :id';
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $freelancer = $statement->fetch();

            $this->id = $id;
            $this->title = $freelancer['title'];
            $this->description = $freelancer['description'];
            $this->user_id = $freelancer['user_id'];
            $this->years_of_experience = $freelancer['years_of_experience'];
            $this->time_created = $freelancer['time_created'];
            $this->is_active = $freelancer['is_active'];

            $this->user = new UserModel($freelancer['user_id']);
        }
    }

    public static function create(
        string $title,
        string $description,
        int $user_id,
        int $years_of_experience
    ): FreelancerModel {
        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO freelancer (title, description, user_id, years_of_experience) VALUES (:title, :description, :user_id, :years_of_experience)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':years_of_experience', $years_of_experience);
        $statement->execute();

        return new FreelancerModel($db->lastInsertId());
    }

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getTitle(): mixed
    {
        return $this->title;
    }
    public function getDescription(): mixed
    {
        return $this->description;
    }

    public function getUserId(): mixed
    {
        return $this->user_id;
    }

    public function getYearsOfExperience(): mixed
    {
        return $this->years_of_experience;
    }

    public function getTimeCreated(): mixed
    {
        return $this->time_created;
    }

    public function getIsActive(): mixed
    {
        return $this->is_active;
    }
    public function getUser(): UserModel
    {
        return $this->user;
    }
}