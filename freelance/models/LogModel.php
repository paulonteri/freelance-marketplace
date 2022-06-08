<?php

namespace app\models;

use PDO;
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
    private ?string $type;
    private static array $types = ['Log In', 'Log Out', 'Create Freelancer', 'Create Client', 'Register', 'Reset Password'];
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
    public static function getAllForUser(int $limit = PHP_INT_MAX, int $offset = 0, int $user_id = null, array $types = null): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM log WHERE 1';
        if ($user_id) {
            $sql .= " AND user_id = $user_id";
        }
        if ($types) {
            $sql .= ' AND type IN (';
            $sql .= implode(',', array_map(function ($type) {
                return "'$type'";
            }, $types));
            $sql .= ')';
        }
        $sql .= ' ORDER BY time_created DESC';
        $sql .= " LIMIT :limit OFFSET :offset"; // limit and offset for pagination
        $statement = $db->prepare($sql);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
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

    public static function getTypes(): array
    {
        return self::$types;
    }

    public function getTimeCreated(): string
    {
        return $this->time_created;
    }
}