<?php

require __DIR__ . '/../models/recipe-model.php';

function browseRecipes(): void
{
    $recipes = getAllRecipes();

    require __DIR__ . '/../views/index.php';
}

function showRecipe(int $id)
{
    if (false === $id || null === $id) {
        header("Location: /");
        exit("Wrong input parameter");
    }

    $recipe = getRecipeById($id);

    require __DIR__ . '/../views/show.php';
}

function addRecipe()
{
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        if(!empty($_POST['title']) && !empty($_POST['description'])){
            $recipe = [
                'title' => $_POST['title'],
                'description' => $_POST['description']
            ];
            saveRecipe($recipe);
            header('Location: /');
        } 
        header('Location: /add');
    }

    require __DIR__ . '/../views/form.php';
}
