<?php 
class ModelPage extends Model {
    public function getAds() {
        $sql = "SELECT title, GROUP_CONCAT(categories.name) AS category, description, price, GROUP_CONCAT(users.name) AS author FROM ads
                INNER JOIN categories ON categories.id = ads.category
                INNER JOIN users ON users.id = ads.author";
        $query = $this->getDb()->query($sql);
        
        $arrayAds = [];
        
        while($ad = $query->fetch(PDO::FETCH_ASSOC)) {
            $arrayAds[] = new Ad($ad);
        }

        // var_dump($arrayAds);
        // exit;

        return $arrayAds;
    }
}