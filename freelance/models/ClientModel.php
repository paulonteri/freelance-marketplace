<?php

namespace app\models;

use app\Database;

class ClientModel extends _BaseModel
{
    private $db;

    private int $id;
    private string $title;
    private string $description;
    private int $user_id;
    private $image;
    private $time_created;
    private int $is_active;
    private UserModel $user;


    public function __construct($id = null)
    {
        $this->db = $this->connectToDb();

        if ($id != null) {

            $sql = 'SELECT * FROM client WHERE id = :id';
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $client = $statement->fetch();

            $this->id = $id;
            $this->title = $client['title'];
            $this->description = $client['description'];
            $this->user_id = $client['user_id'];
            $this->image = $client['image'];
            $this->time_created = $client['time_created'];
            $this->is_active = $client['is_active'];

            $this->user = new UserModel($client['user_id']);
        }
    }

    public static function create(
        string $title,
        string $description,
        int $user_id,
        string $image
    ): ClientModel {
        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO client (title, description, user_id, image) VALUES (:title, :description, :user_id, :image)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':image', $image);
        $statement->execute();

        return new ClientModel($db->lastInsertId());
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

    public function getImage(): mixed
    {
        return $this->image;
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