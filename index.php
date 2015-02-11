<!DOCTYPE html>
<html>
<head>
	<title>youtube downloader</title>
	<meta name="Author" content="Michael Zukas (aka Mindaugas Zukauskas)"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>

<br/>
<br/>
<br/>
<br/>

<div class="container">

	<div class="row">


		<div class="jumbotron">
			<h1>youtube downloader (php)</h1>
		</div>
		<table class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>info</th>
				<th>url</th>
			</tr>
			</thead>
			<tbody>


			<?php

			parse_str( file_get_contents( 'http://www.youtube.com/get_video_info?video_id=' . $_GET['id'] . '&el=detailpage' ), $info );

			if ( isset( $info['url_encoded_fmt_stream_map'] ) ) {

				$streams = explode( ',', $info['url_encoded_fmt_stream_map'] );


				foreach ( $streams as $stream ) {

					parse_str( $stream, $real_stream );

					echo "				<tr><td>{$real_stream['quality']} {$real_stream['type']}</td> <td><a href='{$real_stream['url']}' download=''>download</a></td></tr>";
				}
			} else {
				echo "<pre>" . print_r( $info, true ) . "</pre>";

			}
			?>


			</tbody>
		</table>


	</div>

</div>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>