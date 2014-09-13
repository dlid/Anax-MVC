<?php
/**
 * Theme related functions. 
 *
 */

/**
 * Get title for the webpage by concatenating page specific title with site-wide title.
 *
 * @param string $title for this page.
 * @param string $titleAppend a general title to append.
 * @return string/null wether the favicon is defined or not.
 */
/*function get_title($title, $titleAppend = null) {
  return $title . $title_append;
}
*/

/**
 * Get the age of a timestamp in words
 * @param  int  $timestamp [description]
 * @return string The difference in words
 */
function get_time_ago($timestamp) {
	$timeAgo = new TimeAgo();
	return $timeAgo->inWords(date('Y-m-d H:i', $timestamp));
}