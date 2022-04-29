<?php

namespace app\models;

use PDOException;
use app\Database;
use app\utils\DisplayAlert;

class FreelancerModel extends _BaseModel
{
    private $db;

    private int $id;
    private string $title;
    private string $description;
    private int $user_id;
    private int $years_of_experience;
    private $time_created;
    private int $is_active;


    public function __construct(int $id)
    {
        $this->db = $this->connectToDb();

        $sql = 'SELECT * FROM freelancer WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $freelancer_s = $statement->fetch();

        $this->id = $id;
        $this->title = $freelancer_s['title'];
        $this->description = $freelancer_s['description'];
        $this->user_id = $freelancer_s['user_id'];
        $this->years_of_experience = $freelancer_s['years_of_experience'];
        $this->time_created = $freelancer_s['time_created'];
        $this->is_active = $freelancer_s['is_active'];
    }

    public static function tryGetById($freelancerId): ?FreelancerModel
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM freelancer WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $freelancerId);
        $statement->execute();
        $freelancer = $statement->fetch();

        if ($freelancer) {
            return new FreelancerModel($freelancerId);
        } else {
            DisplayAlert::displayError('Freelancer not found');
            return null;
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
        return new UserModel($this->user_id);
    }

    public function getSkills(): array
    {
        $skills = array();

        $sql = 'SELECT skill_id FROM freelancer_skill WHERE freelancer_id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $this->id);
        $statement->execute();
        $freelancer_skills = $statement->fetchAll();
        foreach ($freelancer_skills as $freelancer_skill) {
            array_push($skills, new SkillModel($freelancer_skill['skill_id']));
        }

        return $skills;
    }

    public function addSkills(array $skills): void
    {
        $sql = 'INSERT INTO freelancer_skill (freelancer_id, skill_id) VALUES (:freelancer_id, :skill_id)';
        $statement = $this->db->prepare($sql);

        foreach ($skills as $skill) {
            try {
                $statement->bindParam(':freelancer_id', $this->id);
                $statement->bindParam(':skill_id', $skill);
                $statement->execute();
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    // duplicate entry
                    continue;
                } else {
                    // other error. Throw it
                    throw $e;
                }
            }
        }
    }

    /**
     * @return FreelancerModel[]
     */
    public static function getAll(): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT id FROM freelancer';
        $statement = $db->prepare($sql);
        $statement->execute();
        $freelancers = $statement->fetchAll();

        $freelancers_array = [];
        foreach ($freelancers as $freelancer) {
            $freelancers_array[] = new FreelancerModel($freelancer['id']);
        }

        return $freelancers_array;
    }
}
