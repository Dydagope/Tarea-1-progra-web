<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Laravel</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            color: #1f2937;
        }

        header {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: white;
            padding: 24px 40px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.15);
        }

        header h1 {
            margin: 0;
            font-size: 32px;
        }

        header p {
            margin: 8px 0 0;
            opacity: 0.9;
        }

        nav {
            margin-top: 18px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        nav a {
            text-decoration: none;
            color: white;
            background: rgba(255,255,255,0.15);
            padding: 10px 16px;
            border-radius: 999px;
            transition: 0.2s ease;
            font-weight: bold;
        }

        nav a:hover {
            background: rgba(255,255,255,0.28);
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .page-title {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .top-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
            align-items: center;
        }

        .top-actions form {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        th {
            background: #eaf1ff;
            color: #1e3a8a;
            text-align: left;
            padding: 14px;
            font-size: 14px;
        }

        td {
            padding: 14px;
            border-top: 1px solid #e5e7eb;
            vertical-align: top;
        }

        tr:hover {
            background: #f9fbff;
        }

        a {
            color: #2563eb;
            text-decoration: none;
            font-size: 16px;
            line-height: 1.5;
        }

        a:hover {
            text-decoration: underline;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.10);
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 28px;
            align-items: start;
        }

        .book-cover {
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.18);
        }

        .book-thumb {
            width: 70px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .meta p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            margin-top: 16px;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            line-height: 1.5;
        }

        .btn:hover {
            background: #1d4ed8;
            text-decoration: none;
        }

        .btn-secondary {
            background: #64748b;
        }

        .btn-secondary:hover {
            background: #475569;
        }

        .btn-warning {
            background: #f59e0b;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-danger {
            background: #dc2626;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .chips {
            margin-top: 16px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .chip {
            background: #eaf1ff;
            color: #1e3a8a;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: bold;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 18px;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 18px;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
        }

        .table-action-form {
            margin-top: 8px;
        }

        .table-action-btn {
            background: none;
            border: none;
            color: #dc2626;
            cursor: pointer;
            padding: 0;
            font: inherit;
            font-size: 16px;
            line-height: 1.5;
        }

        .table-action-btn:hover {
            text-decoration: underline;
        }

        @media (max-width: 800px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 32px;
            }

            th, td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Biblioteca académica</h1>
        <p>Sitio desarrollado con Laravel, Blade y SQLite</p>

        <nav>
            <a href="{{ route('books.index') }}">Libros</a>
            <a href="{{ route('authors.index') }}">Autores</a>
            <a href="{{ route('publishers.index') }}">Editoriales</a>
        </nav>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="errors">
                <strong>Se encontraron errores:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>