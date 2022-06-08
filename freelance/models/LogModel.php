<?php

namespace app\models;

use app\Database;
use app\Settings;
use app\utils\Mailer;
use DateTime;

class LogModel extends _BaseModel
{
    private $db;

    private int $id;
    private ?int $user_id;
    private string $action;
    private ?string $type; // 'Log In','Log Out','Create Freelancer','Create Client','Register','Reset Password',
    private string $time_created;


    public function __construct(int $id)
    {
        $this->db = $this->connectToDb();

        $sql = 'SELECT * FROM log WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $log = $statement->fetch();

        $this->id = $id;
        $this->user_id = $log['user_id'];
        $this->action = $log['action'];
        $this->type = $log['type'];
        $this->time_created = $log['time_created'];
    }

    public static function create(string $action, ?string $type, ?int $user_id = null)
    {
        $db = (new Database)->connectToDb();
        $sql = 'INSERT INTO log (user_id, action, type) VALUES (:user_id, :action, :type)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':action', $action);
        $statement->bindParam(':type', $type);
        $statement->execute();
    }

    /**
     * @return LogModel[]
     */
    public static function getAllForUser(int $user_id, int $limit = PHP_INT_MAX, int $offset = 0): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM log WHERE user_id = :user_id ORDER BY time_created DESC';
        $sql .= 'LIMIT :limit OFFSET :offset';
        $statement = $db->prepare($sql);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':limit', $limit);
        $statement->bindParam(':offset', $offset);
        $statement->execute();

        $logs = [];
        while ($log = $statement->fetch()) {
            $logs[] = new LogModel($log['id']);
        }

        return $logs;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function getUser(): ?UserModel
    {
        if ($this->user_id) {
            return UserModel::tryGetById($this->user_id);
        }
        return null;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getTimeCreated(): string
    {
        return $this->time_created;
    }
}