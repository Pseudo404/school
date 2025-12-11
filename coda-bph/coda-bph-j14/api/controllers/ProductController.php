<?php

class ProductController extends AbstractController
{
    public function list() : void
    {
        $manager = new ProductManager();

        $products = $manager->findAll();
        $arrayProducts = [];

        foreach($products as $product)
        {
            $arrayProducts[] = $product->toArray();
        }

        $manager = new ReviewManager();

        $reviews = $manager->findAll();
        $arrayReviews = [];

        foreach($reviews as $review)
        {
            $arrayReviews[] = $review->toArray();
        }

        $this->render([
            "code" => 200,
            "products" => $arrayProducts,
            "reviews" => $arrayReviews
        ]);
    }

    public function details(int $id) : void
    {
        $p_manager = new ProductManager();

        $product = $p_manager->findById($id);

        $r_manager = new ReviewManager();

        $reviews = $r_manager->findAll();
        
        $compteur = 0;
        $note = NULL;

        $id_reviews = [];
        foreach($reviews as $review){
            if($review->getProduct()->getId()===$id){
                $compteur++;
                $note = $note + $review->getStarNumber();
                $id_reviews[] = $review->toArray();
            }
        }

        $this->render([
            "code" => 200,
            "product" => $product->toArray(),
            "review" => $id_reviews,
            "moyenne" => $note/$compteur
        ]);
    }
}