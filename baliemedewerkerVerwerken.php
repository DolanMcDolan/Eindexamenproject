<?php
$rollen = array("admin", "baliemedewerker");
require_once("./security.php");
?>

<?php
if (isset($_POST['update'])) {
    echo "<h3 style='text-align: center;' >Film is beschikbaar <gezet></gezet> aan database.</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    header("refresh:10;url=index.php?content=baliemedewerkerHomepage");
    require_once("./classes/BalieMedewerkerClass.php");
    BalieMedewerkerClass::update_aantal_beschikbaar($_POST);
} else {
    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript"
                src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
              type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            .header {
                font-size: 24px;
                padding: 20px;
            }

            th {
                min-width: 300px;
            }
        </style>
    </head>
    <body>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h2>Baliemedewerker Pagina</h2></div>
            </div>
            <row class="row">
                <h3>Video</h3>
                <form role="form" action='' method='post'>
                    <div class="form-group">
                        <label for="id">VideoId</label>
                        <input type="text" class="form-control" name="idProduct" placeholder="Voer videoid in.">
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update</button>

                </form>
                <br>
            </row>
    <?php
}