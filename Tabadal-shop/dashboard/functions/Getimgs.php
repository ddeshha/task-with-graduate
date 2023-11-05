<?php
class GetImgs {
    static function get($productId, $conn){
        $sql = "SELECT * FROM `images` WHERE `productId` = '{$productId}'";
        $query = $conn -> query($sql);

        // var_dump($query);

        foreach($query as $imgs){
            return $imgs["name"];
        }
    }
}