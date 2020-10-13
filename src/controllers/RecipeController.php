<?php

namespace controllers;

require __DIR__ . '/../models/RecipeModel.php';

use models\RecipeModel;

class RecipeController
{
    private $model;

    public function __construct()
    {
        $this->model = new RecipeModel();
    }

    public function browse(): void
    {
        $recipes = $this->model->getAll();

        require __DIR__ . '/../views/index.php';
    }

    public function show(int $id)
    {
        if (false === $id || null === $id) {
            header("Location: /");
            exit("Wrong input parameter");
        }

        $recipe = $this->model->getOneById($id);
    
        require __DIR__ . '/../views/show.php';
    }

    public function add()
    {
        $recipe = null;

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            if(!empty($_POST['title']) && !empty($_POST['description'])){
                $recipe = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description']
                ];
                $this->model->saveRecipe($recipe);
                header('Location: /');
            } 
            header('Location: /add');
        }
    
        require __DIR__ . '/../views/form.php';
    }

    public function edit(int $id)
    {
        if (false === $id || null === $id) {
            header("Location: /");
            exit("Wrong input parameter");
        }

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            if(!empty($_POST['title']) && !empty($_POST['description'])){
                $recipe = [
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description']
                ];
                $this->model->editRecipe($recipe);
                header('Location: /');
            } 
            header('Location: /add');
        }
    
        $recipe = $this->model->getOneById($id);

        require __DIR__ . '/../views/form.php';
    }

    public function delete(int $id)
    {
        $this->model->deleteRecipe($id);
        return header("Location: /");
    }
}