<?php
class Ad {
    private int $id = 12;
    private string $title = 'title';
    private string $category = 'Inconnue';
    private string $description = 'Ceci est une description';
    private int $price = 0;
    private string $author = 'Inconnu';

    public function __construct(array $datas) {
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

    public function getTitle() : string {
        return $this->title;
    }

    public function setTitle(string $title) : void {
        $this->title = $title;
    }

    public function getCategory() : string {
        return $this->category;
    }

    public function setCategory(string $category) : void {
        $this->category = $category;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function setDescription(string $description) : void {
        $this->description = $description;
    }

    public function getPrice() : int {
        return $this->price;
    }

    public function setPrice(string $price) : void {
        $this->price = $price;
    }

    public function getAuthor() : string {
        return $this->author;
    }

    public function setAuthor(string $author) : void {
        $this->author = $author;
    }
}