<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $emailAdres = $_POST['emailAdres'];
    $tel = $_POST['tel'];
    $comment = $_POST['comment'];
    $from = 'From: Website_Webshop Marklin';
    $to = '[placeholder]';
    $subject = 'Nieuw bericht van ' . $_POST['name'];

    $body = "Naam: $name\nE-Mail: $emailAdres\nTelefoon: $tel\n\nBericht:\n$comment";

    if (mail($to, $subject, $body, $from)) {
        echo '<h3 style=\'text-align: center;\' >Uw bericht is verzonden!</h3><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
        echo '<meta http-equiv="refresh" content="5" />';
    } else {
        echo '<p>Er is iets fout gegaan. Probeer het opnieuw.</p>';
    }
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
        <link href="Contact.css" rel="stylesheet" type="text/css">
        <style>
            .header {
                font-size: 24px;
                padding: 20px;
            }

            .requiredStar {
                color: red;
                font-size: 13px;
            }
        </style>
    </head>
    <body>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h1>Contact</h1>
                    <p>Als u een vraag of opmerking heeft, vul dan hieronder het contanctformulier in.</p></div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <form role="form" action="index.php?content=contact" method="post">
                        <div class="form-group"><label class="control-label" for="Naam1">Naam</label><span
                                class="requiredStar">*</span>
                            <input class="form-control" id="Naam1" placeholder="Naam" type="text" name="name" required>
                        </div>
                        <div class="form-group"><label class="control-label" for="emailAdres1">E-mail</label><span
                                class="requiredStar">*</span>
                            <input class="form-control" placeholder="E-mail" type="emailAdres" name="emailAdres" required></div>
                        <div class="form-group"><label class="control-label" for="Telefoon">Telefoon<br></label>
                            <input class="form-control" id="Telefoon" placeholder="Telefoon" type="tel" name="tel"
                                   required></div>
                        <div class="form-group"><label class="control-label" for="comment">Vraag/Opmerking</label><span
                                class="requiredStar">*</span>
                            <input class="form-control" id="comment" placeholder="Vraag/Opmerking" type="text"
                                   name="comment" required></div>

                        <button type="submit" class="btn btn-primary" name="submit">Verzend</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>