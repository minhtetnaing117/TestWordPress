<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Miscellaneous functions for use across the plugin
 *
 * @package Simply_Static
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Get the protocol used for the origin URL
*
* @return string http or https
*/
function sist_get_origin_scheme() {
	return is_ssl() ? 'https' : 'http';
}

/**
* Get the host for the origin URL
*
* @return string host (URL minus the protocol)
*/
function sist_get_origin_host() {
	return untrailingslashit( preg_replace( "(^https?://)", "", home_url() ) );
}


/**
 * Echo the selected value for an option tag if the statement is true.
 *
 * @return null
 */
function sist_selected_if( $statement ) {
	echo ( $statement == true ? 'selected="selected"' : '' );
}

/**
 * Truncate if a string exceeds a certain length (30 chars by default)
 *
 * @return string
 */
function sist_truncate( $string, $length = 30, $omission = '...' ) {
	return ( strlen( $string ) > $length + 3 ) ? ( substr( $string, 0, $length ) . $omission ) : $string;
}


/**
 * Use trailingslashit unless the string is empty
 *
 * @return string
 */
function sist_trailingslashit_unless_blank( $string ) {
	return $string === '' ? $string : trailingslashit( $string );
}

/**
 * Dump an object to error_log
 *
 * @return string
 */
function sist_error_log( $object=null ){
    ob_start();
    var_dump( $object );
    $contents = ob_get_contents();
    ob_end_clean();
    error_log( $contents );
}


/**
 * Given a URL extracted from a page, return an absolute URL
 *
 * Takes a URL (e.g. /test) extracted from a page (e.g. http://foo.com/bar/) and
 * returns an absolute URL (e.g. http://foo.com/bar/test). Absolute URLs are
 * returned as-is.
 *
 * A null value is returned in the event that the extracted_url is blank or it's
 * unable to be parsed.
 *
 * @param  string       $extracted_url   Relative or absolute URL extracted from page
 * @param  string       $page_url        URL of page
 * @return string|null                   Absolute URL, or null
 */
function sist_relative_to_absolute_url( $extracted_url, $page_url ) {

	$extracted_url = trim( $extracted_url );

	if ( $extracted_url === '' ) {
		return null;
	}

	$parsed_extracted_url = parse_url( $extracted_url );

	// parse_url can sometimes return false; bail if it does
	if ( $parsed_extracted_url === false ) {
		return null;
	}

	if ( isset( $parsed_extracted_url['host'] ) ) {

		return $extracted_url;

	} elseif ( isset( $parsed_extracted_url['scheme'] ) ) {

		// examples of schemes without hosts: java:, data:
		return $extracted_url;

	} else { // no host on extracted page (might be relative url)

		$path = isset( $parsed_extracted_url['path'] ) ? $parsed_extracted_url['path'] : '';

		// Check for a bug in PHP <= 5.4.7 where URLs starting
		// with '//' are identified as a path
		// http://php.net/manual/en/function.parse-url.php#example-4617
		if ( substr( $path, 0, 2 ) === '//' ) {

			return $extracted_url;

		} else {

			$query = isset( $parsed_extracted_url['query'] ) ? '?' . $parsed_extracted_url['query'] : '';
			$fragment = isset( $parsed_extracted_url['fragment'] ) ? '#' . $parsed_extracted_url['fragment'] : '';

			// turn our relative url into an absolute url
			$extracted_url = phpUri::parse( $page_url )->join( $path . $query . $fragment );

			return $extracted_url;

		}
	}
}

/**
 * Check if URL starts with same URL as WordPress installation
 *
 * @param  string  $url URL to check
 * @return boolean      true if URL is local, false otherwise
 */
function sist_is_local_url( $url ) {
	return ( stripos( $url, home_url() ) === 0 );
}

/**
 * Returns a URL w/o the query string or fragment (i.e. nothing after the path)
 *
 * @param  string $url URL to remove query string/fragment from
 * @return string      URL without query string/fragment
 */
function sist_remove_params_and_fragment( $url ) {
	return preg_replace('/(\?|#).*/', '', $url);
}
