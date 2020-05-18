<!DOCTYPE html>
<html>
<head>
    <title>Diagramas</title>

    <?php
    require_once("comun/config.php");
    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="javascript/datosDiagrama.js"></script>
    <script type="text/javascript">
        cargaDiagrama("navegador");
    </script>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div id="container">
    <form action='index.php'>
        <button id="linkDiagramas">BrowserFingerprint</button>
    </form>
    <div id="headerDiagramas">
        <h2>Diagramas</h2>
    </div>
    <div id="contenidoDiagramas">
        <select id="selectorDiagrama" name="select" onchange="cargaDiagrama(this.value);">
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