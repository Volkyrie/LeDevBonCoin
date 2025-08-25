<?php 
class ModelPage extends Model {
    public function getAds() {
        $sql = "SELECT ads.id, title, GROUP_CONCAT(categories.name) AS category, description, price, GROUP_CONCAT(users.name) AS author FROM ads
                INNER JOIN categories ON categories.id = ads.category
                INNER JOIN users ON users.id = ads.author
                GROUP BY ads.id";
        $query = $this->getDb()->query($sql);
        
        $arrayAds = [];
        
        while($ad = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayAds[] = new Ad($ad);
        }

        // var_dump($arrayAds);
        // exit;

        return $arrayAds;
    }

    public function getOneAdById(int $id) {
        $sql = "SELECT ads.id, title, GROUP_CONCAT(categories.name) AS category, description, price, GROUP_CONCAT(users.name) AS author FROM ads
                INNER JOIN categories ON categories.id = ads.category
                INNER JOIN users ON users.id = ads.author
                WHERE ads.id = :id";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        
        $ad = $query->fetch(PDO::FETCH_ASSOC);


        return $ad ? new Ad($ad) : NULL;
    }

    public function getAdsByAuthor(int $author) {
        $sql = "SELECT ads.id, title, GROUP_CONCAT(categories.name) AS category, description, price, GROUP_CONCAT(users.name) AS author FROM ads
                INNER JOIN categories ON categories.id = ads.category
                INNER JOIN users ON users.id = ads.author
                WHERE ads.author=:author
                GROUP BY ads.id";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(':author', $author, PDO::PARAM_INT);
        $query->execute();
        
        $arrayAds = [];
        
        while($ad = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayAds[] = new Ad($ad);
        }

        // var_dump($arrayAds);
        // exit;

        return $arrayAds;
    }

    public function getCategories() {
        $sql = "SELECT name FROM categories";
        $query = $this->getDb()->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function postAd($title, $category, $price, $description, $author) {
        $categoryId = $this->searchCategory($category);

        $sql="INSERT INTO ads (title, category, description, price, author) VALUES(:title, :category, :description, :price, :author)";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':category', $categoryId, PDO::PARAM_INT);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':author', $author, PDO::PARAM_INT);
        return $query->execute();
    }

    public function searchCategory(string $name) {
        $sql = "SELECT id FROM categories WHERE name=:name";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->execute();
        
        if($category = $query->fetch(PDO::FETCH_ASSOC)) {
            return $category['id'];
        } else {
            $sql = "INSERT INTO categories (name) VALUES (:name)";
            $query = $this->getDb()->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->execute();
            return $this->searchCategory($name);
        }
    }

    public function editOneAdById($id, $title, $category, $price, $description, $author) {
        $categoryId = $this->searchCategory($category);

        $sql="UPDATE ads SET title = :title,
                            category = :categoryId, 
                            description = :description,
                            price = :price,
                            author = :author
                        WHERE ads.id = :id";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':title', $title, PDO::PARAM_STR);
        $query->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':author', $author, PDO::PARAM_INT);
        return $query->execute();
    }

    public function deleteOneAdById(int $id) {
        $sql = "DELETE FROM ads WHERE id= :id";
        $query = $this->getDb()->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }
}