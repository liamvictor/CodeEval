<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/dist/css/bootstrap-custom-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php // include_once($_SERVER['DOCUMENT_ROOT'] . "$root/quiz/inc/functions.php"); ?>

  </head>
<body>

<!-- Wrap all page content here -->
<div id="wrap">

<?php // include_once($_SERVER['DOCUMENT_ROOT'] . "$root/quiz/inc/topnav.php"); ?>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>Index</h1>

<?php

// open this directory
$myDirectory = opendir(".");

if(!empty($myDirectory)){
        // get each entry
        while($entryName = readdir($myDirectory)) {
                if (
                                $entryName != "." && $entryName != ".."
                                && $entryName != "index.php"
                                //  && !(is_dir($entryName))
                                //  && (preg_match("/\.php$|\.htm$|\.html$|\.pdf$|\.zip$/",$entryName))
                   ){
                        $dirArray[] = $entryName;
                }
        }

        // close directory
        closedir($myDirectory);

        if (is_array($dirArray)){
                //      count elements in array
                $indexCount     = count($dirArray);
                // Print ("<p>$indexCount files:</p>\n");
                // sort 'em
                sort($dirArray);
                // print 'em
                print("<TABLE class=\"table\">\n");
                print("<TR>
                        <TH>Filename</TH>
                        <th>Filetype</th>
                        <th>Date</th>
                        <th>Filesize</th>
                        </TR>\n");

                for($index=0; $index< $indexCount; $index++) {
                        if (substr("$dirArray[$index]", 0, 1) != "."){
                                print("<TR><TD><a href=\"$dirArray[$index]\">$dirArray[$index]</a></td>");
                                print("<td>");
                                print(filetype($dirArray[$index]));
                                print("</td>");
                                print("<td>");
                                print(date ("F d Y H:i:s",filemtime($dirArray[$index])));
                                print("</td>");
                                print("<td>");
                                print(number_format(filesize($dirArray[$index])));
                                print("</td>");
                                print("</TR>\n");
                        }
                }
                print("</TABLE>\n");

        }else{
                print ("<p>Nothing here</p>\n");
        }
}else{
        print ("<p>Sorry, couldn't read directory.</p>\b");
}

?>



      </div><!-- col -->
    </div><!-- row -->
  </div> <!-- /container -->
</div> <!-- /wrap -->

<?php // include_once($_SERVER['DOCUMENT_ROOT'] . "$root/quiz/inc/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?=$root;?>/inc/js/bootstrap.min.js"></script>
    <script src="<?=$root;?>/inc/js/docs.min.js"></script>
  </body>
</html>
