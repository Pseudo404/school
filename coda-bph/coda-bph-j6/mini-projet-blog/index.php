<?php 
    require "models/categories.php";
    require "models/users.php";
    require "models/posts.php";
    require "managers/AbstractManager.php";
    require "managers/UserManager.php";
    require "managers/CategoryManager.php";
    require "managers/PostManager.php";

    // $first_user = new User("username", "email", "password", "role", new DateTime("2025-11-28 11:17:20"));

    // var_dump($first_user);

    // echo "<br><br>";

    // $first_categorie = new Categorie("title", "description");

    // var_dump($first_categorie);

    // echo "<br><br>";

    // $first_post = new Post("title", "excerpt", "content", 1, new DateTime("2025-11-28 11:22:20"));

    // var_dump($first_post);

    // $first_post->addCategories($first_categorie);
    // $first_categorie->addPosts($first_post);

    // var_dump($first_categorie);
    // echo "<br><br>";
    // var_dump($first_post);

    // step user manager //

    // $user_manager = new UserManager();
    // $first_user = new User("username", "email", "password", "role", new DateTime("2025-11-28 11:17:20"));
    // var_dump($user_manager->findAll());
    // echo "<br><br>";
    // var_dump($user_manager->findOne(2));
    // echo "<br><br>";
    // var_dump($user_manager->create($first_user));
    // echo "<br><br>";
    // var_dump($user_manager->findAll());
    // echo "<br><br>";
    // var_dump($user_manager->delete(10));

    // step categorie manager //

    // $categorie_manager = new CategoryManager();
    // $first_user = new Categorie("title", "description");
    // var_dump($categorie_manager->findAll());
    // echo "<br><br>";
    // var_dump($categorie_manager->findOne(2));
    // echo "<br><br>";
    // var_dump($categorie_manager->create($first_user));
    // echo "<br><br>";
    // var_dump($categorie_manager->findAll());
    // echo "<br><br>";
    // var_dump($categorie_manager->delete(4));

    // step post manager //

    $post_manager = new PostManager();
    $first_user = new Post("title", "excerpt", "content", 2, new DateTime("2025-11-28 15:23:20"));
    var_dump($post_manager->findAll());
    echo "<br><br>";
    var_dump($post_manager->findOne(2));
    echo "<br><br>";
    // var_dump($post_manager->create($first_user));
    echo "<br><br>";
    var_dump($post_manager->findAll());
    echo "<br><br>";
    // var_dump($post_manager->delete(7));
?>