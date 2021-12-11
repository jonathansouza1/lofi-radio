<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chili Lofi Beats para Programar/Relaxar</title>

	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<?php

	$musicas = array();

	$diretorio = dir('music');

	while($arquivo = $diretorio -> read()){
		if(strpos($arquivo, 'mp3') !== false)
			array_push($musicas, str_replace('.mp3', '', $arquivo));
	}

	?>

	<h1 id="titulo"></h1>
	<audio controls id="audio" src="music/<?php echo $musicas[0]; ?>.mp3" i="0" autoplay></audio>

	<script type="text/javascript">

		const musicas = <?php echo json_encode($musicas); ?>;
		const audio = document.getElementById("audio");
		const titulo = document.getElementById("titulo");

		var musicaAtual = musicas[0];

		audio.addEventListener("ended", function(){

			let i = parseInt(audio.getAttribute('i'));
			i = (i == musicas.length - 1) ? 0 : i + 1; 
			musicaAtual = musicas[i];
			audio.setAttribute('i', i);
			titulo.innerHTML = musicaAtual;
			audio.src = 'music/'+musicaAtual+'.mp3';
			audio.play();

		});

		titulo.innerHTML = musicaAtual;
		audio.src = 'music/'+musicaAtual+'.mp3';
		audio.play();

	</script>






</body>
</html>