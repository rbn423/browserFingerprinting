<!DOCTYPE html>
<html lang="ES">
<head>
    <title>Gráficos</title>

    <?php
    require_once("comun/config.php");
    ?>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="javascript/datosGrafico.js"></script>
    <script src="javascript/asincrono.js"></script>
    <script>
        cargaGrafico("navegador");
    </script>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div id="container">
    <form action='index.php'>
        <button id="linkGraficos">BrowserFingerprint</button>
    </form>
    <div id="headerGraficos">
        <h2>Gráficos</h2>
    </div>
    <div id="contenidoGraficos">
        <select id="selectorGrafico" name="select" onchange="cargaGrafico(this.value);">
            <?php
            $array = array("Navegador" => "navegador",
                "Accept Encoding" => "AcceptEncoding",
                "Cookie Enabled" => "cookieEnabled",
                "Lenguaje" => "language",
                "App Name" => "appName",
                "Zona Horaria" => "zonaHoraria",
                "Color" => "screenColorDepth",
                "Pixel" => "screenPixelDepth",
                "Location Bar" => "locationBar",
                "Pixel Ratio" => "pixelRatio",
                "Menu Bar" => "menuBar",
                "Product" => "product",
                "Product Sub" => "productSub",
                "Sistema Operativo" => "os",
                "Vendor" => "vendor");

            foreach ($array as $i => $value) {
                if ($i == "Navegador")
                    echo "<option value='" . $value . "' selected>" . $i . "</option>";
                else
                    echo "<option value='" . $value . "'>" . $i . "</option>";
            }
            ?>
        </select>
        <div id="piechart_div"></div>
    </div>
</div>
</body>
</html>