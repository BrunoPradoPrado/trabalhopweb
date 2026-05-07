<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Relatório de Editoras</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=DM+Sans:wght@300;400;500&display=swap');
        :root { --ink:#1a1208; --gold:#c4933f; --parch:#f5f0e8; --border:#d8cfc0; --mist:#8a9bb0; }
        * { box-sizing:border-box; margin:0; padding:0; }
        body { font-family:'DM Sans',Arial,sans-serif; font-size:11px; color:var(--ink); background:#fff; }
        .gold-bar { height:4px; background:linear-gradient(90deg,var(--gold),#e8c97a); }
        .report-header { border-bottom:3px solid var(--ink); padding:24px 32px 18px; display:flex; justify-content:space-between; align-items:flex-end; background:var(--parch); }
        .report-header-brand { font-family:'Playfair Display',Georgia,serif; font-size:22px; font-weight:700; color:var(--ink); }
        .report-header-brand span { color:var(--gold); }
        .report-header-meta { text-align:right; color:var(--mist); font-size:10px; line-height:1.7; letter-spacing:.04em; }
        .report-title { padding:18px 32px 12px; border-bottom:1px solid var(--border); }
        .report-title h1 { font-family:'Playfair Display',Georgia,serif; font-size:16px; font-weight:700; }
        .report-title p { color:var(--mist); font-size:10px; margin-top:3px; }
        .report-body { padding:20px 32px 32px; }
        table { width:100%; border-collapse:collapse; }
        thead tr { background:var(--ink); color:rgba(255,255,255,.85); }
        thead th { padding:9px 14px; font-size:9px; font-weight:500; letter-spacing:.1em; text-transform:uppercase; text-align:left; }
        tbody tr { border-bottom:1px solid var(--border); }
        tbody tr:nth-child(even) { background:var(--parch); }
        tbody td { padding:9px 14px; font-size:11px; }
        .id-cell { color:var(--mist); font-size:10px; }
        .footer { position:fixed; bottom:0; left:0; right:0; border-top:1px solid var(--border); background:var(--parch); padding:8px 32px; display:flex; justify-content:space-between; font-size:9px; color:var(--mist); letter-spacing:.04em; }
    </style>
</head>
<body>
    <div class="gold-bar"></div>
    <div class="report-header">
        <div class="report-header-brand">Bi<span>blio</span>teca</div>
        <div class="report-header-meta">
            <div>Gerado automaticamente pelo sistema</div>
            <div>{{ now()->format('d/m/Y \à\s H:i') }}</div>
        </div>
    </div>
    <div class="report-title">
        <h1>{{ $titulo }}</h1>
        <p>Total de registros: {{ count($editoras) }}</p>
    </div>
    <div class="report-body">
        <table>
            <thead>
                <tr>
                    <th style="width:40px;">#</th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Ano de Fundação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($editoras as $editora)
                <tr>
                    <td class="id-cell">{{ $editora->id }}</td>
                    <td><strong>{{ $editora->nome }}</strong></td>
                    <td>{{ $editora->cidade ?? '—' }}</td>
                    <td>{{ $editora->ano_fundacao ?? '—' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        <span>Sistema de Biblioteca — Relatório de Editoras</span>
        <span>{{ now()->format('d/m/Y') }}</span>
    </div>
</body>
</html>