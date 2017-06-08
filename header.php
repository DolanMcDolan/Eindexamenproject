<?php
if (isset($_SESSION['userrole'])) {
    switch ($_SESSION['userrole']) {
        case "2":
            echo "		
        <html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"Artikelen.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
        .header{
            z-index: 100;
        }
    </style>
</head>
<body>
<div class=\"navbar header homeHeader\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\"><span class=\"sr-only\">Toggle navigation</span><span>
                    class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button>
            <a class=\"navbar-brand headertext\" href=\"index.php?content=algemeneHomepage\"><span class=\"header\" style='font-size: 24px;'>Webshop Marklin</span><br></a></div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                <li><a href=\"index.php?content=klantHomepage\">Home</a></li>
                <li><a href=\"index.php?content=Artikelen\">Artikelen</a></li>
                <li><a href=\"index.php?content=mijnAccountGegevens\">Mijn Account</a></li>
                <li><a href=\"index.php?content=logout\">Uitloggen</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
";
            break;
        case "1":
            echo "		
        <html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"Artikelen.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
        .header{
            z-index: 100;
        }
    </style>
</head>
<body>
<div class=\"navbar header homeHeader\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\"><span class=\"sr-only\">Toggle navigation</span><span>
                    class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button>
            <a class=\"navbar-brand headertext\" href=\"index.php?content=algemeneHomepage\"><span class=\"header\" style='font-size: 24px;'>Webshop Marklin</span><br></a></div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                <li><a href=\"index.php?content=adminHomepage\">Home</a></li>
                <li><a href=\"index.php?content=Artikelen\">Artikelen</a></li>
                <li><a href=\"index.php?content=logout\">Uitloggen</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
";
            break;
        case "baliemedewerker":
            echo "		
        <html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"Artikelen.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
        .header{
            z-index: 100;
        }
    </style>
</head>
<body>
<div class=\"navbar header homeHeader\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\"><span class=\"sr-only\">Toggle navigation</span><span>
                    class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button>
            <a class=\"navbar-brand headertext\" href=\"index.php?content=algemeneHomepage\"><span class=\"header\" style='font-size: 24px;'>Webshop Marklin</span><br></a></div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                <li><a href=\"index.php?content=baliemedewerkerHomepage\">Home</a></li>
                <li><a href=\"index.php?content=Artikelen\">Artikelen</a></li>
                <li><a href=\"index.php?content=logout\">Uitloggen</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
";
            break;
        case "bezorger":
            echo "		
        <html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"Artikelen.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
        .header{
            z-index: 100;
        }
    </style>
</head>
<body>
<div class=\"navbar header homeHeader\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\"><span class=\"sr-only\">Toggle navigation</span><span>
                    class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button>
            <a class=\"navbar-brand headertext\" href=\"index.php?content=algemeneHomepage\"><span class=\"header\" style='font-size: 24px;'>Webshop Marklin</span><br></a></div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                <li><a href=\"index.php?content=bezorgerHomepage\">Home</a></li>
                <li><a href=\"index.php?content=Artikelen\">Artikelen</a></li>
                <li><a href=\"index.php?content=logout\">Uitloggen</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
";
            break;
        case "eigenaar":
            echo "		
        <html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"Artikelen.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
        .header{
            z-index: 100;
        }
    </style>
</head>
<body>
<div class=\"navbar header homeHeader\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\"><span class=\"sr-only\">Toggle navigation</span><span>
                    class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button>
            <a class=\"navbar-brand headertext\" href=\"index.php?content=algemeneHomepage\"><span class=\"header\" style='font-size: 24px;'>Webshop Marklin</span><br></a></div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                <li><a href=\"index.php?content=adminHomepage\">Home</a></li>
                <li><a href=\"index.php?content=Artikelen\">Artikelen</a></li>
                <li><a href=\"index.php?content=logout\">Uitloggen</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
";
            break;
        case "geblokkeerd":
            echo "		
        <html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"Artikelen.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
        .header{
            z-index: 100;
        }
    </style>
</head>
<body>
<div class=\"navbar header homeHeader\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\"><span class=\"sr-only\">Toggle navigation</span><span>
                    class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button>
            <a class=\"navbar-brand headertext\" href=\"index.php?content=algemeneHomepage\"><span class=\"header\" style='font-size: 24px;'>Webshop Marklin</span><br></a></div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav navbar-right\" style='font-size: 24px;'>
                <li><a href=\"index.php?content=geblokkeerdHomepage\">Home</a></li>
                <li><a href=\"index.php?content=Artikelen\">Artikelen</a></li>
                <li><a href=\"index.php?content=logout\">Uitloggen</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
";
    }
} else {
    echo "		
        <html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"Artikelen.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
        .header{
            z-index: 100;
        }
    </style>
</head>
<body>
<div class=\"navbar header homeHeader\">
    <div class=\"container\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\"><span class=\"sr-only\">Toggle navigation</span><span>
                    class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button>
            <a class=\"navbar-brand headertext\" href=\"index.php?content=algemeneHomepage\"><span class=\"header\">Webshop Marklin</span><br></a></div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            <ul class=\"nav navbar-nav navbar-right\">
                <li><a href=\"index.php?content=algemeneHomepage\">Home</a></li>
                <li><a href=\"index.php?content=Artikelen\">Artikelen</a></li>
                <li><a href=\"index.php?content=inloggen_registreren\">Inloggen/Registreren</a></li>
                <li><a href=\"index.php?content=contact\">Contact<br></a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
";
}
?>