<?php
/**
 * Créé par Maison Sagan
 * Développeur: Gabriel Paquin
 * Date: 13-03-18
 */
$access_token="7293693374.1677ed0.9c703cd895224e0ea7c963f14a139423";
$photo_count=9;
     
$json_link="https://api.instagram.com/v1/users/self/media/recent/?";
$json_link.="access_token={$access_token}&count={$photo_count}";

$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

$instagram_array;

foreach ($obj['data'] as $i => $post) {
	$instagram_array[$i]['src'] = str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
	$instagram_array[$i]['alt'] = $post['caption']['text'];
	$instagram_array[$i]['link'] = $post['link'];
}
