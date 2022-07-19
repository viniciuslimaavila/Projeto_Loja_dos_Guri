<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de varejo - Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>   
</head>
<body>
    <header class="bg-violet-800">
        <ul class="flex">
            <li
             class="mx-3">
                <a href="../../index.html">Home</a>
            </li>
<li>
    <a href="#">Cadastro</a>
</li>
        </ul>

    
    </header>
    <main class="mt-4 ml-4">
        <form action="../Controller/product.php" method="POST">
            <section class="columns-3">
<article>
    <label for="name"> Digite o nome </label>
    <input type="text" id="name" name="name" class="border border-blue-400"placeholder = "Digite aqui">
</article>

<article>
<label for="Email" > Criar email:</label>
<input type="email" id="email" name="email" class="border border-blue-400" min=1 max=100>
</article>

<article>
<label for="Password" >Senha:</label>
<input type="password" id="password" name="password" class="border border-blue-400" placeholder = "senha">
</article>
            </section>
            <article class="flex justify-center mt-4">
                <button type="submit" class="rounded p-4 bg-blue-700 text-white">cadastrar</button>

</article>
</form>
    </main>
</body>
</html>

