<?php
class User {
    private int $id = 12;
    private string $name = 'toto';
    private string $email = 'toto@gmail.com';
    private string $password = 'test';
    private DateTimeImmutable $created_at;

    public function __construct(array $datas) {
        $this->created_at = new \DateTimeImmutable();
        $this->hydrate($datas);
    }

    private function hydrate(array $datas) {
        foreach($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) : void {
        $this->name = $name;
    }

       public function getEmail() :string {
        return $this->email;
    }

    public function setEmail(string $email) : void {
        $this->email = $email;
    }

       public function getPassword() :string {
        return $this->password;
    }

    public function setPassword(string $password) :void {
        $this->password = $password;
    }

    public function getCreated_at() : DateTimeImmutable {
        return $this->created_at;
    }

    public function setCreated_at(string $created_at) : void {
        $this->created_at = new \DateTimeImmutable($created_at);
    }
}