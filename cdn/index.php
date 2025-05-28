<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Explorador de Archivos</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      color: #333;
      margin: 0;
      padding: 2rem;
    }
    h1 {
      font-size: 28px;
      margin-bottom: 1rem;
      color: #222;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    ul {
      list-style: none;
      padding-left: 0;
    }
    li {
      margin: 8px 0;
      font-size: 16px;
    }
    a {
      text-decoration: none;
      color: #0077cc;
      display: inline-block;
      padding: 6px 10px;
      border-radius: 6px;
      transition: background 0.2s;
    }
    a:hover {
      background: #e6f0ff;
    }
    .icon {
      margin-right: 8px;
    }
    .folder {
      font-weight: bold;
      color: #1b5e20;
    }
    .file {
      color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>📁 Explorador de Archivos</h1>
    <ul>
      <?php
        function listar($ruta) {
          $items = scandir($ruta);
          foreach ($items as $item) {
            if ($item === '.' || $item === '..') continue;
            $fullPath = $ruta . '/' . $item;
            $displayPath = htmlspecialchars($item);
            if (is_dir($fullPath)) {
              echo "<li><span class='icon'>📁</span><a class='folder' href=\"$fullPath\">$displayPath/</a></li>";
              echo "<ul>";
              listar($fullPath);
              echo "</ul>";
            } else {
              echo "<li><span class='icon'>📄</span><a class='file' href=\"$fullPath\">$displayPath</a></li>";
            }
          }
        }

        listar(".");
      ?>
    </ul>
  </div>
</body>
</html>