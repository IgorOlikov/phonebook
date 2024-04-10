<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

<div class="flex flex-col items-center justify-center py-64">
    <div>
        <p><?= $params['name'] ?></p>
        <p><?= $params['number'] ?></p>
    </div>
    <div>
        <a href="/">
            <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                На главную!
            </button>
        </a>
    </div>
</div>

</body>
</html>