<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>@yield('titulo', 'Biblioteca') — Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --ink:     #1a1208;
            --parch:   #f5f0e8;
            --cream:   #faf7f2;
            --gold:    #c4933f;
            --gold-lt: #e8c97a;
            --rust:    #9b3a2a;
            --sage:    #4a6741;
            --mist:    #8a9bb0;
            --border:  #d8cfc0;
            --shadow:  rgba(26,18,8,.10);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--ink);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── Navbar ── */
        .site-nav {
            background: var(--ink);
            border-bottom: 3px solid var(--gold);
            padding: 0;
        }

        .nav-inner {
            display: flex;
            align-items: stretch;
            gap: 0;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px 14px 0;
            text-decoration: none;
            border-right: 1px solid rgba(196,147,63,.3);
            margin-right: 8px;
        }

        .nav-brand-icon {
            font-size: 1.5rem;
            color: var(--gold);
        }

        .nav-brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: #fff;
            letter-spacing: .02em;
            white-space: nowrap;
        }

        .nav-brand-text span {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            align-items: stretch;
            list-style: none;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
        }

        .nav-links li { display: flex; }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 0 16px;
            color: rgba(255,255,255,.72);
            text-decoration: none;
            font-size: .82rem;
            font-weight: 500;
            letter-spacing: .06em;
            text-transform: uppercase;
            transition: color .2s, background .2s;
            border-bottom: 3px solid transparent;
            margin-bottom: -3px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--gold-lt);
            border-bottom-color: var(--gold);
            background: rgba(196,147,63,.07);
        }

        .nav-toggle {
            background: none;
            border: 1px solid rgba(196,147,63,.4);
            color: var(--gold);
            border-radius: 6px;
            padding: 6px 10px;
            margin-left: auto;
            font-size: 1.1rem;
            cursor: pointer;
            display: none;
        }

        @media (max-width: 768px) {
            .nav-toggle { display: block; }
            .nav-links { display: none; width: 100%; }
            .nav-links.open { display: flex; flex-direction: column; padding: 8px 0 12px; }
            .nav-links a { padding: 10px 20px; border-bottom: none; }
        }

        /* ── Page header strip ── */
        .page-header {
            background: var(--parch);
            border-bottom: 1px solid var(--border);
            padding: 28px 0 22px;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-header h1 .icon-badge {
            width: 42px; height: 42px;
            background: var(--ink);
            color: var(--gold);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .page-header .breadcrumb {
            font-size: .78rem;
            color: var(--mist);
            margin: 4px 0 0;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        /* ── Main wrapper ── */
        .main-content {
            flex: 1;
            padding: 36px 0 60px;
        }

        /* ── Cards ── */
        .lib-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 2px 12px var(--shadow);
            overflow: hidden;
        }

        .lib-card-header {
            background: var(--parch);
            border-bottom: 1px solid var(--border);
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .lib-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0;
        }

        /* ── Buttons ── */
        .btn-ink {
            background: var(--ink);
            color: var(--gold-lt);
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: .82rem;
            font-weight: 500;
            letter-spacing: .04em;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background .2s, transform .15s;
            cursor: pointer;
        }
        .btn-ink:hover { background: #2e2010; color: var(--gold-lt); transform: translateY(-1px); }

        .btn-gold {
            background: var(--gold);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: .82rem;
            font-weight: 500;
            letter-spacing: .04em;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background .2s, transform .15s;
            cursor: pointer;
        }
        .btn-gold:hover { background: #a97b2e; color: #fff; transform: translateY(-1px); }

        .btn-sage {
            background: var(--sage);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: .82rem;
            font-weight: 500;
            letter-spacing: .04em;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background .2s, transform .15s;
            cursor: pointer;
        }
        .btn-sage:hover { background: #3a5332; color: #fff; transform: translateY(-1px); }

        .btn-rust {
            background: var(--rust);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: .82rem;
            font-weight: 500;
            letter-spacing: .04em;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background .2s, transform .15s;
            cursor: pointer;
        }
        .btn-rust:hover { background: #7a2a1c; color: #fff; transform: translateY(-1px); }

        .btn-ghost {
            background: transparent;
            color: var(--ink);
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 7px 18px;
            font-size: .82rem;
            font-weight: 500;
            letter-spacing: .04em;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: border-color .2s, background .2s, transform .15s;
            cursor: pointer;
        }
        .btn-ghost:hover { border-color: var(--gold); color: var(--gold); background: rgba(196,147,63,.05); transform: translateY(-1px); }

        .btn-icon-only {
            width: 32px; height: 32px;
            padding: 0;
            border-radius: 7px;
            font-size: .9rem;
            justify-content: center;
        }

        /* ── Table ── */
        .lib-table { width: 100%; border-collapse: collapse; }

        .lib-table thead tr {
            background: var(--ink);
            color: rgba(255,255,255,.85);
        }

        .lib-table thead th {
            padding: 13px 18px;
            font-size: .72rem;
            font-weight: 500;
            letter-spacing: .1em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .lib-table tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background .15s;
        }

        .lib-table tbody tr:hover { background: var(--parch); }

        .lib-table tbody td {
            padding: 13px 18px;
            font-size: .9rem;
            vertical-align: middle;
        }

        .lib-table tbody tr:last-child { border-bottom: none; }

        /* ── Forms ── */
        .lib-label {
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--mist);
            margin-bottom: 6px;
            display: block;
        }

        .lib-input {
            width: 100%;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            padding: 10px 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: .92rem;
            background: #fff;
            color: var(--ink);
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }

        .lib-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(196,147,63,.14);
        }

        /* ── Alerts ── */
        .lib-alert {
            border-radius: 10px;
            padding: 14px 18px;
            font-size: .88rem;
            border: 1.5px solid;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .lib-alert-success { background: #f0f8f0; border-color: #7cb97c; color: #2d6a2d; }
        .lib-alert-danger  { background: #fdf2f2; border-color: #e09090; color: #7a2020; }

        /* ── Search bar ── */
        .search-wrap {
            position: relative;
            max-width: 300px;
        }
        .search-wrap .bi-search {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--mist);
            font-size: .85rem;
        }
        .search-wrap input {
            padding-left: 34px;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-size: .85rem;
            height: 36px;
            background: #fff;
            color: var(--ink);
            outline: none;
            transition: border-color .2s;
        }
        .search-wrap input:focus { border-color: var(--gold); }

        /* ── Badge pills ── */
        .lib-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 99px;
            font-size: .72rem;
            font-weight: 500;
            letter-spacing: .04em;
        }
        .lib-badge-gold { background: rgba(196,147,63,.15); color: #8a5e10; }
        .lib-badge-sage { background: rgba(74,103,65,.12); color: var(--sage); }
        .lib-badge-rust { background: rgba(155,58,42,.12); color: var(--rust); }
        .lib-badge-mist { background: rgba(138,155,176,.15); color: #4a6080; }

        /* ── Stars ── */
        .stars { color: var(--gold); letter-spacing: 1px; }

        /* ── Avatar ── */
        .lib-avatar {
            width: 42px; height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border);
        }
        .lib-avatar-placeholder {
            width: 42px; height: 42px;
            border-radius: 50%;
            background: var(--parch);
            border: 2px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            color: var(--mist);
            font-size: .85rem;
        }

        /* ── Footer ── */
        .site-footer {
            border-top: 1px solid var(--border);
            background: var(--parch);
            padding: 18px 0;
            text-align: center;
            font-size: .78rem;
            color: var(--mist);
            letter-spacing: .04em;
        }

        /* ── Animations ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .anim-fade-up { animation: fadeUp .35s ease both; }

        /* ── Pagination override ── */
        .pagination .page-link {
            border-color: var(--border);
            color: var(--ink);
            font-size: .82rem;
        }
        .pagination .page-item.active .page-link {
            background: var(--ink);
            border-color: var(--ink);
            color: var(--gold-lt);
        }
        .pagination .page-link:hover { background: var(--parch); color: var(--gold); }
    </style>

    @stack('styles')
</head>

<body>

    {{-- ── Navbar ── --}}
    <nav class="site-nav">
        <div class="container">
            <div class="nav-inner">
                <a class="nav-brand" href="{{ route('home') }}">
                    <i class="bi bi-book-half nav-brand-icon"></i>
                    <span class="nav-brand-text">Bi<span>blio</span>teca</span>
                </a>

                <button class="nav-toggle" id="navToggle">
                    <i class="bi bi-list"></i>
                </button>

                <ul class="nav-links" id="navLinks">
                    <li><a href="{{ route('livros.index') }}"    class="{{ request()->routeIs('livros*')    ? 'active' : '' }}"><i class="bi bi-book"></i> Livros</a></li>
                    <li><a href="{{ route('autores.index') }}"   class="{{ request()->routeIs('autores*')   ? 'active' : '' }}"><i class="bi bi-person-badge"></i> Autores</a></li>
                    <li><a href="{{ route('categorias.index') }}" class="{{ request()->routeIs('categorias*') ? 'active' : '' }}"><i class="bi bi-tag"></i> Categorias</a></li>
                    <li><a href="{{ route('editoras.index') }}"  class="{{ request()->routeIs('editoras*')  ? 'active' : '' }}"><i class="bi bi-building"></i> Editoras</a></li>
                    <li><a href="{{ route('sagas.index') }}"     class="{{ request()->routeIs('sagas*')     ? 'active' : '' }}"><i class="bi bi-collection"></i> Sagas</a></li>
                    <li><a href="{{ route('avaliacoes.index') }}" class="{{ request()->routeIs('avaliacoes*') ? 'active' : '' }}"><i class="bi bi-star"></i> Avaliações</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ── Page header ── --}}
    @hasSection('page_title')
    <div class="page-header">
        <div class="container">
            @yield('page_header')
        </div>
    </div>
    @endif

    {{-- ── Content ── --}}
    <main class="main-content">
        <div class="container anim-fade-up">

            @if(session('success'))
                <div class="lib-alert lib-alert-success mb-4">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('erro'))
                <div class="lib-alert lib-alert-danger mb-4">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    {{ session('erro') }}
                </div>
            @endif

            @yield('conteudo')
        </div>
    </main>

    <footer class="site-footer">
        Sistema de Biblioteca &nbsp;·&nbsp; {{ date('Y') }}
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('navToggle')?.addEventListener('click', () => {
            document.getElementById('navLinks').classList.toggle('open');
        });
    </script>
    @stack('scripts')
</body>
</html>