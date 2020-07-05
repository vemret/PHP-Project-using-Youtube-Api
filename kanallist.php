<!DOCTYPE html>
<html>
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
        <h2>YouTubeMini</h2>
      </div>
    </div>
    <nav class="navbar navbar-light bg-light" style="padding: 10px 10px 10px 10px;">
	  	<form class="form-inline">
		    <button class="btn btn-sm btn-outline-secondary" type="button" style="float: right;"><a href="kanallist.php?kanal=UCKFIi1uWM9BCMb7O_GyvBsQ">Niloya</a></button>
		    <button class="btn btn-sm btn-outline-secondary" type="button" style="float: right;"><a href="kanallist.php?kanal=UCrFf5dtMe6M1XJHqbKJ4X6Q">TRT Çoçuk</a></button>
		    <button class="btn btn-sm btn-outline-secondary" type="button" style="float: right;"><a href="kanallist.php?kanal=UC4fmBMzf7iWyFx7ysCCLqDA">Düşyeri</a></button>
		    <button class="btn btn-sm btn-outline-secondary" type="button" style="float: right;"><a href="kanallist.php?kanal=UCURSfY00AASuqKxT-V2Gi1g">AfacanTV</a></button>
	 	</form>
	</nav>
	</br> </br>

	<?php 




$kanal =@$_GET["kanal"];

if(isset($kanal)){

	$kisi_api= "https://www.googleapis.com/youtube/v3/channels?key=AIzaSyB7A4QpemwN8F8fyeSPusvlLiAF40unSYI&part=contentDetails,brandingSettings,contentOwnerDetails,id,invideoPromotion,localizations,snippet,statistics,status,topicDetails&id=".$kanal;

	@$baglan1= file_get_contents($kisi_api);

	preg_match_all('@"title": "(.*?)"@', $baglan1, $video_isim);
 	preg_match_all('@"description": "(.*?)"@', $baglan1, $video_aciklama);
	

	$kanal_url = "https://www.youtube.com/channel/".$kanal."/videos";

 	$baglan2 = file_get_contents($kanal_url);

 	//echo $baglan2;

 	preg_match_all('@aria-describedby="(.*?)" data-sessionlink="(.*?)" href="(.*?)" rel="nofollow">(.*?)</a>@', $baglan2, $video_resim);

 	//print_r($video_resim);

 	@str_replace("watch?v=", "", $video_resim[3][$i]);

 	$video_detay = "https://www.googleapis.com/youtube/v3/videos?id=wpGCdkwV5L4&key=AIzaSyB7A4QpemwN8F8fyeSPusvlLiAF40unSYI&part=snippet";

 	@$baglan3= file_get_contents($video_detay);

 ?>



		<div class="row text-center">
			<?php
				for($i=0;$i<count($video_resim[1]);$i++){

					$videolar_id = str_replace("watch?v=", "", $video_resim[3][$i]);

 					$video_detay = "https://www.googleapis.com/youtube/v3/videos?id=".$videolar_id."&key=AIzaSyB7A4QpemwN8F8fyeSPusvlLiAF40unSYI&part=snippet";

 					$baglan3= @file_get_contents($video_detay);

 					preg_match_all('@"url": "https://i.ytimg.com/vi/(.*?)/hqdefault.jpg",@', $baglan3, $videoresim);

 					preg_match_all('@"description": "(.*?)",@', $baglan3, $videodetay);

			?>
			<div class="col-sm-4" style="padding: 5px 5px 5px 5px;">
				<div class="thumbnail">
					<img src="<?php echo "https://i.ytimg.com/vi".$videolar_id."/hqdefault.jpg"; ?>" alt="Paris" width="350" height="250">
					<p><strong><?php echo $video_resim[4][$i]; ?></strong></p>
					<p><?php echo @$videodetay[1][$i]; ?></p>
					<a href="videodevam.php?video_id=<?php echo $videolar_id; ?>" class="btn btn-succcess">Videoyu İzle</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>
<?php }else{
	echo "Lütfen Yukardaki Kanallardan Birini Seçiniz!";
} ?>