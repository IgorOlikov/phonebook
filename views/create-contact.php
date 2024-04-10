<body>
    <div class="flex flex-col items-center justify-center py-64">
    <h1>Создать контакт</h1>
    <form action="/contact-store" method="POST" class="max-w-sm mx-auto">
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Имя</label>
            <input type="text" name="name" class="border-4"/>
        </div>
        <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Телефон</label>
            <input type="text" name="number"  class="border-4"/>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Создать контакт</button>
    </form>
    </div>
</body>
</html>