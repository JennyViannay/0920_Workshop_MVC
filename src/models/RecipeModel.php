<?php

namespace models;

use \PDO;

class RecipeModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function getAll(): array
    {
        $statement = $this->connection->query('SELECT id, title FROM recipe');
        $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $recipes;
    }

    public function getOneById(int $id): array
    {
        $query = 'SELECT * FROM recipe WHERE id=:id';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $recipe = $statement->fetch(PDO::FETCH_ASSOC);

        return $recipe;
    }

    public function saveRecipe(array $recipe): int
    {
        $statement = $this->connection->prepare("INSERT INTO recipe (title, description) VALUES (:title, :description)");
        $statement->bindValue(':title', $recipe['title'], PDO::PARAM_STR);
        $statement->bindValue(':description', $recipe['description'], PDO::PARAM_STR);
        $statement->execute();
        $lastId = $this->connection->lastInsertId();
        return $lastId;
    }

    public function editRecipe(array $recipe): void
    {
        $statement = $this->connection->prepare("UPDATE recipe SET title=:title, description=:description WHERE id=:id");
        $statement->bindValue(':id', $recipe['id'], PDO::PARAM_INT);
        $statement->bindValue(':title', $recipe['title'], PDO::PARAM_STR);
        $statement->bindValue(':description', $recipe['description'], PDO::PARAM_STR);
        $statement->execute();
        
    }

    public function deleteRecipe(int $id): void
    {
        $statement = $this->connection->prepare("DELETE FROM recipe WHERE id=:id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        
    }
}
