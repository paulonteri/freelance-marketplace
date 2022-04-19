<?php

namespace app\models;

use app\Database;
use app\utils\DisplayAlert;


class JobRatingModel extends _BaseModel
{
    private $db;

    private int $id;
    private int $job_id;
    private string $type; // freelancer/client
    private string $comment;
    private int $rating;


    public function __construct($id = null)
    {
        $this->db = $this->connectToDb();

        if ($id != null) {

            $sql = 'SELECT * FROM job_rating WHERE id = :id';
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $jobRating = $statement->fetch();

            $this->id = $id;
            $this->job_id = $jobRating['job_id'];
            $this->type = $jobRating['type'];
            $this->comment = $jobRating['comment'];
            $this->rating = $jobRating['rating'];
        }
    }

    public static function create(
        int $jobId,
        string $type,
        string $comment,
        int $rating,

    ): ?JobRatingModel {
        if (!in_array($type, ['freelancer', 'client'])) {
            DisplayAlert::displayError('Invalid type');
            return null;
        }

        if ($rating < 1 || $rating > 5) {
            DisplayAlert::displayError('Invalid rating');
            return null;
        }

        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO job_rating (job_id, type, comment, rating) VALUES (:job_id, :type, :comment, :rating)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':job_id', $jobId);
        $statement->bindParam(':type', $type);
        $statement->bindParam(':comment', $comment);
        $statement->bindParam(':rating', $rating);
        $statement->execute();

        return new JobRatingModel($db->lastInsertId());
    }

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getJobId(): mixed
    {
        return $this->job_id;
    }

    public function getType(): mixed
    {
        return $this->type;
    }

    public function getComment(): mixed
    {
        return $this->comment;
    }

    public function getRating(): mixed
    {
        return $this->rating;
    }

    public function getJob(): JobModel
    {
        return new JobModel($this->job_id);
    }

    /**
     * @return JobRatingModel[]
     */
    public static function getAll(): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT id FROM job_rating';
        $statement = $db->prepare($sql);
        $statement->execute();
        $jobRatings = $statement->fetchAll();

        $jobRatingModels = [];

        foreach ($jobRatings as $jobRating) {
            $jobRatingModels[] = new JobRatingModel($jobRating['id']);
        }

        return $jobRatingModels;
    }
}