<?php

class ProductCategoryManager extends AbstractManager
{
    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM product_categories');
        $parameters = [

        ];
        $query->execute($parameters);

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];

        foreach ($results as $result)
        {
            $category = new ProductCategory($result['name'], $result['description'], $result['id']);
            $categories[] = $category;
        }

        return $categories;
    }

    public function findById(int $id) : ? ProductCategory
    {
        $query = $this->db->prepare('SELECT * FROM product_categories WHERE id = :id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $category = new ProductCategory($result['name'], $result['description'], $result['id']);

            return $category;
        }

        return null;
    }
}