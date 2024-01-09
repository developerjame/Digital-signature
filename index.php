<?php
   $folderPath = "uploads/";
   $image_parts = explode(";base64,", $_POST['signed']);
   $image_type_aux = explode("image/", $image_parts[0]);
   $image_type = $image_type_aux[1];
   $image_base64 = base64_decode($image_parts[1]);
   $file = $folderPath. uniqid() . '.'.$image_type;
   file_put_contents($file, $image_base64);
   echo "Signature Uploaded Successfully.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="jquery.signature/js/jquery.signature.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.signature/css/jquery.signature.css">

    <style>
        .kbw-signature {width: 400px; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <h3>PHP Signature Pad & upload on server</h3>
            <div class="col-md-12">
                <label for="">Signature</label>
                <br/>
                <div id="sig"></div>
                <br/>
                <button id="clear">Clear Signature</button>
                <textarea name="signed" id="signature64" cols="30" rows="10" style="display: none;"></textarea>

            </div>
            <br/>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function (e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
</body>
</html>