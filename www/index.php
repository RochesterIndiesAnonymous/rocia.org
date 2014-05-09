<html>

<!-- KEVIN IS A DBAG LOLOLOL

   .(0,-.0)._
  (------,   ` -. _
    \.____/         \._
     / /  /  __          \_._
   / /   / ./  \_____./'\._  <
/\/\    /\/\    \  /       \/'
                 \ \_
               ./\/\/'
-->

  <head>
    <title>Rochester Indies Anonymous</title>
    <style>
      html {
        color: white;
        background-color: black;
      }
      .wrap {
        width: 100%;
        height: 100%;
        background: url(bg.jpg) no-repeat center center fixed; 
        -webkit-background-size: contain;
        -moz-background-size: contain;
        -o-background-size: contain;
        background-size: contain;
      }
      .info {
        background-color: rgba(31,31,31,0.75);
        width: 32em;
        padding: 1em;
      }
    </style>
  </head>
  <body>
    <div class="wrap">
      <div class="info">
        <h3>About ROCIA</h3>
          <p><b>Roc</b>hester <b>I</b>ndies <b>A</b>nonymous (<i>r&auml;k-y&auml;</i>) is a "support" group for independent video game developers in Rochester, NY. If you are interested in coming to our meetings, please contact us by facebook!</p>
        <a href="https://www.facebook.com/groups/ROCIndiesAnonymous"><img src="fb.png"/></a>
        <a href="https://twitter.com/josefnpat/lists/rocia"><img src="tw.png"/></a>
        <a href="https://github.com/RochesterIndiesAnonymous"><img src="gh.png"/></a>
<?php

$data = json_decode(file_get_contents('data.json'));
$talks = $data->talks;
?>
        <h3>Talks</h3>
        <ul>
<?php
  foreach($talks as $talk){
    echo "<li>".$talk->date." &mdash; ".$talk->title." <a href='https://twitter.com/".$talk->twitter."'>@".$talk->twitter."</a> &mdash; ";
    if(isset($talk->youtube)){
      echo "<a href='https://www.youtube.com/watch?v=".$talk->youtube."'>YouTube</a> ";
    }
    if(isset($talk->download)){
      echo "<a href='".$talk->download."'>Download</a> ";
    }
    echo "</li>\n";
  }
?>
        </ul>
      </div>
    </div>
  </body>
</html>
