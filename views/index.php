<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Contacts</h1>
    <?php foreach ($params as $id => $contact): ?>
        <h1><?= $id ?></h1>
        <h1><?= $contact['name'] ?></h1>
        <h1><?= $contact['number'] ?></h1>
        <a href="/contact/<?= $id ?>">
            <button>Show</button>
        </a>
        <form action="/contact/<?= $id ?>" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Delete</button>
        </form>
     <?php endforeach; ?>
</body>
</html>