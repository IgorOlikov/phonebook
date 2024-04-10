<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PhoneBook</title>
</head>
<body>

<div class="flex flex-col items-center justify center pt-64">
    <h1>Контакты</h1>
    <div>
        <a href="/contact-create">
            <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
            >Создать контакт</button>
        </a>
    </div>
</div>

<div class="flex items-center justify-center w-full max-h-screen">
    <div class="flex-col">

    <?php foreach ($params as $id => $contact): ?>
            <div>
                <div class="flex-row">
                    <div>
                        <p class="bg gray-200"><?= $contact['name'] ?></p>
                        <p><?= $contact['number'] ?></p>
                    <div

                    <div class="flex">
                        <div>
                            <a href="/contact/<?= $id ?>">
                                <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                                >Открыть</button>
                            </a>
                        </div>
                        <div class="">
                            <form action="/contact/<?= $id ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                            <button
                                    type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full"
                            >Удалить</button>
                            </form>
                        </div>

                    <div>
                </div>
            </div>
    <?php endforeach; ?>
    </div>
</div>
</body>
</html>