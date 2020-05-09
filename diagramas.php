<html>
<head>
    <title>Diagramas</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="javascript/datosDiagrama.js"></script>
    <script type="text/javascript">
        cargaDiagrama("navegador");
    </script>
<body>
<p><a href="index.php">BrowserFingerPrint</a></p>
<h1>Diagramas</h1>
<select name="select" onchange="cargaDiagrama(this.value);">
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
<table class="columns">
    <tr>
        <td>
            <div id="piechart_div"></div>
        </td>
    </tr>
</table>
</body>
</html>