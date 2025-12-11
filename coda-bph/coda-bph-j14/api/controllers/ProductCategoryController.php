<?php

class ProductCategoryController extends AbstractController
{
    public function list() : void
    {
        $manager = new ProductCategoryManager();

        $categories = $manager->findAll();
        $arrayCategories = [];
        
        $p_manager = new ProductManager();

        $products = $p_manager->findAll();
        $arrayProducts = [];

        foreach($categories as $category){
            $arrayCategories[] = $category->toArray();
            foreach($products as $product){
                if($category->getId()===$product->getCategory()->getId()){
                    $arrayProducts[$category->getId()][] = $product->toArray();
                }
            }
        }



        $this->render([
            "code" => 200,
            "categories" => $arrayCategories,
            "products" => $arrayProducts
        ]);

    }

    public function details(int $id) : void
    {
        $manager = new ProductCategoryManager();

        $category = $manager->findById($id);

        $p_manager = new ProductManager();

        $products = $p_manager->findAll();
        $id_products = [];

        foreach($products as $product){
            if($product->getCategory()->getId()===$id){
                $id_products[] = $product->toArray();
            }
        }

        if($category!=NULL){
            $this->render([
                "code" => 200,
                "categories" => $category->toArray(),
                "products" => $id_products
            ]);
        }
    }
}