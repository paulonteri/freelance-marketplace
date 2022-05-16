<?php

namespace app\models;

use app\Database;
use PDO;


class SkillModel extends _BaseModel
{
    private $db;

    private int $id;
    private string $name;


    public function __construct(int $id)
    {
        $this->db = $this->connectToDb();

        $sql = 'SELECT * FROM skill WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $skill = $statement->fetch();

        $this->id = $id;
        $this->name = $skill['name'];
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

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @return SkillModel[]
     */
    public static function getAll(int $limit = PHP_INT_MAX, int $offset = 0,): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT id FROM `skill` ORDER BY `name` ASC';
        $sql .= " LIMIT :limit OFFSET :offset"; // limit and offset for pagination
        $statement = $db->prepare($sql);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        $skills = $statement->fetchAll();

        $skillModels = [];

        foreach ($skills as $skill) {
            $skillModels[] = new SkillModel($skill['id']);
        }

        return $skillModels;
    }

    public static function getAllCount(): int
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT COUNT(*) FROM `skill`';
        $statement = $db->prepare($sql);
        $statement->execute();
        $count = $statement->fetchColumn();

        return $count;
    }
}