<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <?php foreach ($params as $id => $contact): ?>
        <h1>Contacts</h1>
        <h1><?= $id ?></h1>
        <h1><?= $contact['name'] ?></h1>
        <h1><?= $contact['number'] ?></h1>
     <?php endforeach; ?>
</body>
</html>