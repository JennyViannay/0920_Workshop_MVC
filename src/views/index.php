<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marmiwild - List</title>
</head>

<body>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">title</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><a href="show?id=<?= $recipe['id'] ?>"><?= $recipe['title'] ?></a></td>
                <td><a href="edit?id=<?= $recipe['id'] ?>">Edit</a></td>
                <td><a href="delete?id=<?= $recipe['id'] ?>">Delete</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="/add">Add</a>
</body>

</html>