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
      a {
        color: #22C8CF;
      }
    </style>
  </head>
  <body>
    <div class="wrap">
      <div class="info">
        <h3>About ROCIA</h3>
          <p><b>Roc</b>hester <b>I</b>ndies <b>A</b>nonymous (<i>r&auml;k-y&auml;</i>) is a "support" group for independent video game developers in Rochester, NY. If you are interested in coming to our meetings, please contact us by facebook!</p>
        <a href="https://www.facebook.com/groups/ROCIndiesAnonymous"><img src="fb.png" width=32 height=32/></a>
        <a href="https://twitter.com/josefnpat/lists/rocia"><img src="tw.png" width=32 height=32/></a>
        <a href="https://github.com/RochesterIndiesAnonymous"><img src="gh.png" width=32 height=32/></a>
        <a href="wiki">Wiki</a>
<?php

$data = json_decode(file_get_contents('data.json'));
$talks = $data->talks;
$jams = $data->jams;
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
<?php
  foreach($jams as $jam_name => $jam){
?>
        <h3><?php echo $jam_name; ?></h3>
        <ul>
<?php
    shuffle($jam);
    foreach($jam as $game){
      echo "<li>";
      if(isset($game->lduid)){
        echo "<a href='http://www.ludumdare.com/compo/ludum-dare-29/?action=preview&uid=".$game->lduid."'>".$game->name."</a> ";
      }
      if(isset($game->uri)){
        echo "<a href='".$game->uri."'>".$game->name."</a> ";
      }
      echo "by ";
      $people = array();

      // Twitter
      if(isset($game->twitter)){
        if(is_array($game->twitter)){
          $twitter_people = $game->twitter;
        } else {
          $twitter_people = array($game->twitter);
        }
        foreach($twitter_people as $twitter_person){
          $people[] = "<a href='https://twitter.com/".$twitter_person."'>@".$twitter_person."</a>";
        }
      }
      // Credit
      if(isset($game->credit)){
        if(is_array($game->credit)){
          $credit_people = $game->credit;
        } else {
          $credit_people = array($game->credit);
        }
        foreach($credit_people as $credit_person){
          $people[] = $credit_person;
        }
      }

      echo implode(", ",$people);

      echo "</li>\n";
    }
?>
        </ul>
<?php
  }
?>
      </div>
    </div>
  </body>
</html>
