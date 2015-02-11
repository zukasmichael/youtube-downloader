<?php

parse_str( file_get_contents( 'http://www.youtube.com/get_video_info?video_id=' . $_GET['id'] .'&el=detailpage' ), $info );

if ( isset( $info['url_encoded_fmt_stream_map'] ) ) {

	$streams = explode( ',', $info['url_encoded_fmt_stream_map'] );


	foreach ( $streams as $stream ) {

		parse_str( $stream, $real_stream );
		echo "{$real_stream['quality']} {$real_stream['type']} <a href='{$real_stream['url']}' download=''>url</a><br>";
	}
} else {
	echo "<pre>" . print_r( $info, true ) . "</pre>";

}
