<?php

class ReviewManager extends AbstractManager
{
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM reviews');
        $parameters = [

        ];
        $query->execute($parameters);

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $reviews = [];

        $product_m = new ProductManager();

        foreach ($results as $result)
        {
            $review = new Review($result['content'], $result['author'], $result['star_number'], $product_m->findById($result['product_id']), $result['id']);
            $reviews[] = $review;
        }

        return $reviews;
    }

    public function findById($id) : ? Review
    {
        $query = $this->db->prepare('SELECT * FROM reviews WHERE id=:id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);

        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $product_m = new ProductManager();

        if($result!=NULL){
            return new Review($result['content'], $result['author'], $result['star_number'], $product_m->findById($result['product_id']), $result['id']);
        }

        return null;
    }
}