<!DOCTYPE html>
<html>
<head>
    <title>Sistema Biblioteca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand" href="/">Biblioteca</a>

<ul class="navbar-nav">

<li class="nav-item">
<a class="nav-link" href="autores">Autores</a>
</li>

<li class="nav-item">
<a class="nav-link" href="categorias">Categorias</a>
</li>

<li class="nav-item">
<a class="nav-link" href="livros">Livros</a>
</li>

<li class="nav-item">
<a class="nav-link" href="editoras">Editoras</a>
</li>

</ul>

</div>
</nav>

<div class="container mt-4">
    @yield('conteudo')
</div>

</body>
</html>