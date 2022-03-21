<?php

namespace app\models;

class UserModel extends _BaseModel
{
  private $db;

  protected ?int $id = null;
  protected ?string $username = null;
  protected ?string $email = null;
  protected ?string $phone = null;
  protected ?string $password = null;
  protected ?string $first_name = null;
  protected ?string $middle_name = null;
  protected ?string $last_name = null;
  //  protected ?String $image = null;
  protected ?string $country = null;
  protected ?string $county = null;
  protected ?string $city = null;
  protected ?string $street = null;
  protected ?string $postal_code = null;
  protected ?bool $is_admin = null;
  protected ?bool $is_active = null;
  protected ?string $time_created = null;



  public function __construct($id = null)
  {
    $this->db = $this->connectToDb();

    if ($id != null) {

      $sql = 'SELECT * FROM user WHERE id = :id';
      $statement = $this->db->prepare($sql);
      $statement->bindParam(':id', $id);
      $statement->execute();
      $user = $statement->fetch();

      $this->id = $id;
      $this->username = $user['username'];
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
      $this->street = $user['street'];
      $this->postal_code = $user['postal_code'];
      $this->is_admin = $user['is_admin'];
      $this->is_active = $user['is_active'];
      $this->time_created = $user['time_created'];
    }
  }

  public static function getCurrentUser(): ?UserModel
  {
    $authModel = new AuthModel();
    if ($authModel->isUserLoggedIn()) {
      return new UserModel($_SESSION['user_id']);
    }
    return null;
  }

  public function isFreelancer(): bool
  {
    $sql = 'SELECT * FROM freelancer WHERE user_id = :user_id';
    $statement = $this->db->prepare($sql);
    $statement->bindParam(':user_id', $this->id);
    $statement->execute();
    $freelancer = $statement->fetch();

    if (!$freelancer) {
      return false;
    }
    return true;
  }

  public function isClient(): bool
  {
    $sql = 'SELECT * FROM client WHERE user_id = :user_id';
    $statement = $this->db->prepare($sql);
    $statement->bindParam(':user_id', $this->id);
    $statement->execute();
    $client = $statement->fetch();

    if (!$client) {
      return false;
    }
    return true;
  }


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getUsername(): ?string
  {
    return $this->username;
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
    return $this->lastName;
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

  public function getStreet(): ?string
  {
    return $this->street;
  }

  public function getPostalCode(): ?string
  {
    return $this->postal_code;
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
}