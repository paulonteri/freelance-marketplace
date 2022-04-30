<?php

namespace app\models;

use app\Database;
use app\utils\DisplayAlert;

class ClientModel extends _BaseModel
{
    private $db;

    private int $id;
    private string $title;
    private string $description;
    private int $user_id;
    private string $image;
    private string $type;
    private $time_created;
    private int $is_active;

    public function __construct(int $id)
    {
        $this->db = $this->connectToDb();

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
        $this->type = $client['type'];
        $this->time_created = $client['time_created'];
        $this->is_active = $client['is_active'];
    }

    public static function tryGetById(int $id): ?ClientModel
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM client WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $client = $statement->fetch();

        if ($client) {
            return new ClientModel($id);
        } else {
            DisplayAlert::displayError('Client not found');
            return null;
        }
    }

    public static function create(
        string $title,
        string $description,
        int $user_id,
        string $image,
        string $type
    ): ClientModel {
        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO client (title, description, user_id, image, type) VALUES (:title, :description, :user_id, :image, :type)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':image', $image);
        $statement->bindParam(':type', $type);
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

    public function getType(): mixed
    {
        return $this->type;
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
        return new UserModel($this->user_id);
    }

    /**
     * Get the average of all ratings for this client
     *
     * @return float
     */
    public function getAverageRating(): float
    {

        $sql = 'SELECT AVG(rating) FROM job_rating WHERE type = "client" AND job_id IN (SELECT id FROM job WHERE client_id = :id)';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->id);
        $statement->execute();
        $averageRating = $statement->fetch();

        if ($averageRating && $averageRating['AVG(rating)'] !== null) {
            return round($averageRating['AVG(rating)'], 1);
        }

        return 0.0;
    }

    public function getAverageRatingImage(): string
    {
        return JobRatingModel::getImageForRatingInt($this->getAverageRating());
    }
}