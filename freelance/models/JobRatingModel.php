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


    public function __construct(int $id)
    {
        $this->db = $this->connectToDb();

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

    public function delete(): void
    {
        $sql = 'DELETE FROM job_rating WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->id);
        $statement->execute();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getJobId(): int
    {
        return $this->job_id;
    }

    public function getJob(): JobModel
    {
        return new JobModel($this->job_id);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function getRatingImage(): string
    {
        return $this->getImageForRatingInt($this->rating);
    }

    /**
     * Returns the image path for the given rating
     *
     * @param integer $rating
     * @return string
     */
    public static function getImageForRatingInt(float $rating): string
    {
        if ($rating > 4) {
            return '/static/icons/rating/rating-5-stars.png';
        } else if ($rating > 3) {
            return '/static/icons/rating/rating-4-stars.png';
        } else if ($rating > 2) {
            return '/static/icons/rating/rating-3-stars.png';
        } else if ($rating > 1) {
            return '/static/icons/rating/rating-2-stars.png';
        } else if ($rating > 0) {
            return '/static/icons/rating/rating-1-stars.png';
        } else {
            // todo: create 0 star
            return '/static/icons/rating/rating-1-stars.png';
        }
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