<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PhoneBook</title>
</head>
<body>
<h1>Контакты</h1>
<div>
    <a href="/contact-create">
        <button>Создать контакт</button>
    </a>
</div>

<div class="flex items-center justify-center w-full py-54 max-h-screen">
    <div class="flex-col ">
        <div class="flex-row">
    <?php foreach ($params as $id => $contact): ?>

                    <div class="border ">
                        <p class="bg gray-200"><?= $contact['name'] ?></p>
                        <p><?= $contact['number'] ?></p>
                    <div

                    <div>
                        <div>
                            <a href="/contact/<?= $id ?>">
                                <button>Открыть</button>
                            </a>
                        </div>
                        <div>
                            <form action="/contact/<?= $id ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                            <button type="submit">Удалить</button>
                            </form>
                        </div>
                    <div>

         <?php endforeach; ?>
        </div>
    </div>
</body>
</html>