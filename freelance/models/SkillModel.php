<?php

namespace app\models;

use app\Database;

class SkillModel extends Database
{
    private $db;

    private int $id;
    private string $name;


    public function __construct($id = null)
    {
        $this->db = $this->connectToDb();

        if ($id != null) {

            $sql = 'SELECT * FROM skill WHERE id = :id';
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $skill = $statement->fetch();

            $this->id = $id;
            $this->name = $skill['name'];
        }
    }

    public static function create(
        string $name,
    ): SkillModel {
        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO skill (name) VALUES (:name)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->execute();

        return new SkillModel($db->lastInsertId());
    }

    /**
     * @return SkillModel[]
     */
    public static function getAll(): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT id FROM skill';
        $statement = $db->prepare($sql);
        $statement->execute();
        $skills = $statement->fetchAll();

        $skillModels = [];

        foreach ($skills as $skill) {
            $skillModels[] = new SkillModel($skill['id']);
        }

        return $skillModels;
    }

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getName(): mixed
    {
        return $this->name;
    }
}