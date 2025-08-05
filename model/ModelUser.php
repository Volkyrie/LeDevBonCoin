<?php 
class ModelUser extends Model {
    public function createUser(string $name, string $email, string $password) : bool {
        $sql = "INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, NOW())";
        $query = $this->getDb()->prepare($sql);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        return $query->execute();
    }

    public function searchUser(string $email) : ?User {
        $sql = "SELECT id, name, email, password, created_at FROM users WHERE email=:email";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        return $query->rowCount() > 0 ? new User($user) : null;
    }
}