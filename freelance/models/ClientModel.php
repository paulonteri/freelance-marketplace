<?php

namespace app\models;

use PDO;
use app\Database;
use app\utils\Logger;
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
    private string $national_id;

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
        $this->national_id = $client['national_id'];
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
        string $type,
        string $national_id
    ): ?ClientModel {
        $db = (new Database)->connectToDb();

        $user = UserModel::tryGetById($user_id);
        if (!$user) {
            DisplayAlert::displayError('User not found.');
            return null;
        } else if ($user->isFreelancer()) {
            DisplayAlert::displayError('User is already a freelancer.');
            return null;
        } else if ($user->getIsAdmin()) {
            DisplayAlert::displayError('Admin cannot be a client.');
            return null;
        }

        $sql = 'INSERT INTO client (title, description, user_id, image, type, national_id) VALUES (:title, :description, :user_id, :image, :type, :national_id)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':image', $image);
        $statement->bindParam(':type', $type);
        $statement->bindParam(':national_id', $national_id);
        $statement->execute();

        $id = $db->lastInsertId();

        Logger::log("Client with id $id has been created for user with id $user_id", $user_id, 'Create Client');

        return new ClientModel($id);
    }

    public function update(
        string $title,
        string $description,
        string $type,
    ) {
        $sql = "UPDATE client SET title = :title, description = :description, type = :type WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->id);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':type', $type);
        $statement->execute();

        Logger::log("Client with id $this->id has been updated", $this->user_id);

        return true;
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

    public function getNationalId(): mixed
    {
        return $this->national_id;
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

    /**
     * Get all ratings given to the client.
     * 
     * @return JobRatingModel[]
     */
    public function getAllRatings(): array
    {

        $sql = 'SELECT id FROM job_rating WHERE type = "client" AND job_id IN (SELECT id FROM job WHERE client_id = :id)';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->id);
        $statement->execute();
        $ratings = $statement->fetchAll();

        $ratings_array = [];
        foreach ($ratings as $rating) {
            $ratings_array[] = new JobRatingModel($rating['id']);
        }

        return $ratings_array;
    }

    /**
     * @return ClientModel[]
     */
    public static function getAll(int $limit = PHP_INT_MAX, int $offset = 0,): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT id FROM client ORDER BY time_created DESC';
        $sql .= " LIMIT :limit OFFSET :offset"; // limit and offset for pagination
        $statement = $db->prepare($sql);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        $clients = $statement->fetchAll();

        $clients_array = [];
        foreach ($clients as $client) {
            $clients_array[] = new ClientModel($client['id']);
        }

        return $clients_array;
    }

    public static function getAllCount(): int
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT COUNT(*) FROM client';
        $statement = $db->prepare($sql);
        $statement->execute();
        $count = $statement->fetch();

        return $count['COUNT(*)'];
    }
}