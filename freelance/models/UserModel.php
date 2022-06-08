<?php

namespace app\models;

use PDO;
use app\Database;
use app\utils\Logger;
use app\utils\DisplayAlert;

class UserModel extends _BaseModel
{
  private $db;

  protected ?int $id = null;
  protected ?string $email = null;
  protected ?string $phone = null;
  protected ?string $password = null;
  protected ?string $first_name = null;
  protected ?string $middle_name = null;
  protected ?string $last_name = null;
  protected ?String $image = null;
  protected ?string $country = null;
  protected ?string $county = null;
  protected ?string $city = null;
  protected ?bool $is_admin = null;
  protected ?bool $is_active = null;
  protected ?string $time_created = null;

  public function __construct(int $id)
  {
    $this->db = $this->connectToDb();

    $sql = 'SELECT * FROM user WHERE id = :id';
    $statement = $this->db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $user = $statement->fetch();

    $this->id = $id;
    $this->email = $user['email'];
    $this->phone = $user['phone'];
    $this->password = $user['password'];
    $this->first_name = $user['first_name'];
    $this->middle_name = $user['middle_name'];
    $this->last_name = $user['last_name'];
    $this->image = $user['image'];
    $this->country = $user['country'];
    $this->county = $user['county'];
    $this->city = $user['city'];
    $this->is_admin = $user['is_admin'];
    $this->is_active = $user['is_active'];
    $this->time_created = $user['time_created'];
  }

  public static function getCurrentUser(): ?UserModel
  {
    $authModel = new AuthModel();
    if ($authModel->isUserLoggedIn()) {
      return new UserModel($_SESSION['user_id']);
    }
    return null;
  }

  public static function tryGetById(int $id): ?UserModel
  {
    $db = (new Database)->connectToDb();

    $sql = 'SELECT * FROM user WHERE id = :id';
    $statement = $db->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $user = $statement->fetch();

    if ($user) {
      return new UserModel($user['id']);
    } else {
      DisplayAlert::displayError('user not found');
      return null;
    }
  }

  public static function tryGetByEmail(string $email): ?UserModel
  {
    $db = (new Database)->connectToDb();

    $sql = 'SELECT * FROM user WHERE email = :email';
    $statement = $db->prepare($sql);
    $statement->bindParam(':email', $email);
    $statement->execute();
    $user = $statement->fetch();

    if ($user) {
      return new UserModel($user['id']);
    } else {
      return null;
    }
  }

  public function update(
    $email,
    $first_name,
    $last_name,
    $middle_name,
    $phone,
    $county,
    $city,
  ) {

    $sql = "UPDATE user SET email = :email, first_name = :first_name, last_name = :last_name, middle_name = :middle_name, phone = :phone, county = :county, city = :city";
    $sql .= " WHERE id = :id";
    $statement = $this->db->prepare($sql);
    $isSuccessful = $statement->execute(
      array(
        'id' => $this->id,
        ':email' => $email,
        ':first_name' => $first_name,
        ':middle_name' => $middle_name,
        ':last_name' => $last_name,
        ':phone' => $phone,
        'county' => $county,
        'city' => $city,
      )
    );

    if ($isSuccessful) {
      Logger::log("User with id {$this->id} updated", $this->id);
    }

    return true;
  }


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function getPhone(): ?string
  {
    return $this->phone;
  }

  public function getFirstName(): ?string
  {
    return $this->first_name;
  }

  public function getMiddleName(): ?string
  {
    return $this->middle_name;
  }

  public function getLastName(): ?string
  {
    return $this->last_name;
  }

  public function getName()
  {
    $name = '';
    if ($this->first_name) {
      $name .= $this->first_name;
    }

    if ($this->middle_name) {
      $name .= ' ' . $this->middle_name;
    }

    if ($this->last_name) {
      $name .= ' ' . $this->last_name;
    }

    return $name;
  }

  public function getCountry(): ?string
  {
    return $this->country;
  }

  public function getCounty(): ?string
  {
    return $this->county;
  }

  public function getCity(): ?string
  {
    return $this->city;
  }

  public function getIsAdmin(): ?bool
  {
    return $this->is_admin;
  }

  public function getIsActive(): ?bool
  {
    return $this->is_active;
  }

  public function getTimeCreated(): ?string
  {
    return $this->time_created;
  }

  public function getImage(): ?string
  {
    return $this->image;
  }

  public function getFreelancer(): ?FreelancerModel
  {
    $sql = 'SELECT * FROM freelancer WHERE user_id = :user_id';
    $statement = $this->db->prepare($sql);
    $statement->bindParam(':user_id', $this->id);
    $statement->execute();
    $freelancer = $statement->fetch();

    if ($freelancer) {
      return new FreelancerModel($freelancer['id']);
    }
    return null;
  }
  public function isFreelancer(): bool
  {
    if (!$this->getFreelancer()) {
      return false;
    }
    return true;
  }

  public function getClient(): ?ClientModel
  {
    $sql = 'SELECT * FROM client WHERE user_id = :user_id';
    $statement = $this->db->prepare($sql);
    $statement->bindParam(':user_id', $this->id);
    $statement->execute();
    $client = $statement->fetch();

    if (!$client) {
      return null;
    }

    return new ClientModel($client['id']);
  }

  public function isClient(): bool
  {
    if (!$this->getClient()) {
      return false;
    }
    return true;
  }

  /**
   * @return UserModel[]
   */
  public static function getAll(int $limit = PHP_INT_MAX, int $offset = 0,): array
  {
    $db = (new Database)->connectToDb();

    $sql = 'SELECT id FROM user ORDER BY time_created DESC';
    $sql .= " LIMIT :limit OFFSET :offset"; // limit and offset for pagination
    $statement = $db->prepare($sql);
    $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
    $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    $statement->execute();
    $users = $statement->fetchAll();

    $users_array = [];
    foreach ($users as $user) {
      $users_array[] = new UserModel($user['id']);
    }

    return $users_array;
  }

  public static function getAllCount(): int
  {
    $db = (new Database)->connectToDb();

    $sql = 'SELECT COUNT(*) FROM user';
    $statement = $db->prepare($sql);
    $statement->execute();
    $count = $statement->fetchColumn();

    return $count;
  }

  /**
   * Change admin status
   */
  public function setIsAdmin(bool $is_admin)
  {
    $is_admin_int = $is_admin ? 1 : 0;

    $sql = "UPDATE user SET is_admin = :is_admin WHERE id = :id";
    $statement = $this->db->prepare($sql);
    $statement->bindParam(':is_admin', $is_admin_int);
    $statement->bindParam(':id', $this->id);
    $statement->execute();

    $this->is_admin = $is_admin;
  }
}