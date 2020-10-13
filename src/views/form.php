<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marmiwild - Form</title>
</head>

<body>
    <a href="/">Home</a>
    <h1>Add recipe</h1>
    <form method="POST">
        <input type="text" name="title" value="<?= $recipe ? $recipe['title'] : '' ?>">
        <textarea type="text" name="description"><?= $recipe ? $recipe['description'] : '' ?></textarea>
        <button type="submit">Save</button>
        <input type="text" name="id" value="<?= $recipe ? $recipe['id'] : '' ?>" style="display:none">
    </form>
</body>

</html>