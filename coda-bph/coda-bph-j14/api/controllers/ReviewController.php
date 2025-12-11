<?php

class ReviewController extends AbstractController
{
    public function list() : void
    {

        $manager = new ReviewManager();

        $reviews = $manager->findAll();
        $arrayReviews = [];

        foreach($reviews as $review)
        {
            $arrayReviews[] = $review->toArray();
        }

        $this->render([
            "code" => 200,
            "reviews" => $arrayReviews
        ]);

    }

    public function details(int $id) : void
    {
        $manager = new ReviewManager();

        $review = $manager->findById($id);

        if($review!=NULL){
            $this->render([
                "code" => 200,
                "review" => $review->toArray()
            ]);
        }
    }
}