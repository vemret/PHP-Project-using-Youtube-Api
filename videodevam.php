<?php 
$video_id = @$_GET["video_id"];

if(isset($video_id)){

  $aranacak = "https://www.googleapis.com/youtube/v3/search?q=".$video_id."&maxResults=50&part=snippet&key=AIzaSyB7A4QpemwN8F8fyeSPusvlLiAF40unSYI";
  @$baglan = file_get_contents($aranacak);

  preg_match_all('@"title": "(.*?)"@', $baglan, $video_isim);
  preg_match_all('@"description": "(.*?)"@', $baglan, $video_aciklama);
  preg_match_all('@"channelTitle": "(.*?)"@', $baglan, $video_ekleyen);


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>YouTubeMini</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <h1><label>Video Ekleyen</label>: <?php echo @$video_ekleyen[1][0]; ?></h1>
        <hr> </br>
        <h2><label>Video Adi</label>: <a href="videodevam.php?video_id=<?php echo @$video_id;?>"><?php echo @$video_isim[1][0];?></a></h2>
        
      </div>
    </div>
      <div class="container">
         <iframe width="1070" height="535" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         <hr>
         <div class="alert alert-info"></div>
         <p><?php echo @$video_aciklama[1][1];?></p>
      </div>
    </div>

  </div>
   
</body>
</html>
<?php 
}else{
  echo "hata";
}
?>