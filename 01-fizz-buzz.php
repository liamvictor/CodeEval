
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fizz Buzz</title>

    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>CodeEval - FIZZ BUZZ</h1>
        <p class="lead">Challenge: <a href="https://www.codeeval.com/open_challenges/1/">Fizz Buzz</a>.</p>
      </div>

      <div class="row">
        <div class="col-xs-12">


<?php
$err=0;
$fizz_file_path = "01-fizz-buzz-input-file.txt";
if ($fizz_file_array = @file($fizz_file_path) ){

  if(is_array($fizz_file_array)) {
    // The number of test cases ≤ 20
    if (count($fizz_file_array) <= 20){
      foreach($fizz_file_array AS $line => $str){
        //  print ("<p>$line: $str</p>");
        $elements = explode(" ",$str);
        if (count($elements) >= 2){
          if (is_array($elements)) {
          // "X" is in range [1, 20]
            if (filter_var($elements[0], FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 20 ) ) ) ){
              $x = $elements[0];
            }else{
              print ("<p class=\"alert alert-warning\">Error: Line $line. X value (" . $elements[0] . ") not valid.</p>".PHP_EOL);
              $err++;
            }
          // "Y" is in range [1, 20]
            if (filter_var($elements[1], FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 20 ) ) ) ){
              $y = $elements[1];
            }else{
              print ("<p class=\"alert alert-warning\">Error: Line $line. Y value (" . $elements[1] . ") not valid.</p>".PHP_EOL);
              $err++;
            }
          // "N" is in range [21, 100]
            if (filter_var($elements[2], FILTER_VALIDATE_INT, array('options' => array('min_range' => 21, 'max_range' => 100 ) ) ) ){
              $n = $elements[2];
            }else{
              print ("<p class=\"alert alert-warning\">Error: Line $line. N value (" . $elements[2] . ") not valid.</p>".PHP_EOL);
              $err++;
            }
            if ($err == 0){
            // do the sums.
              $thisstr = NULL;
              for ($i=1; $i<=$n; $i++){
                if ($i % $x == 0) {
                  $thisstr .= "F";
                  if ($i % $y == 0){
                    $thisstr .= "B ";
                  }else{
                    $thisstr .= " ";
                  }
                }elseif ($i % $y == 0 ){
                  $thisstr .= "B ";
                }else{
                  $thisstr .= "$i ";
                }
              }
              $thisstr = trim($thisstr);
              print ("<p>$thisstr</p>");

            }else{
              $err = 0;
            }
          }
        }else{
          print ("<p class=\"alert alert-warning\">Error: Line is not three elements.</p>".PHP_EOL);
        }
      }


    }else{
      print ("<p class=\"alert alert-warning\">Error: File &gt; 20 lines.</p>".PHP_EOL);
    }
    
  }

}else{
  print ("<p class=\"alert alert-warning\">Error: File Not Found</p>".PHP_EOL);
}

?>

        </div>
      </div>


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
  </body>
</html>
