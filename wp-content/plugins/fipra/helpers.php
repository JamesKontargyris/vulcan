<?php

// Helper functions

/**
 * Helper function to layout each team member in a team group carousel
 *
 * @param $post_id
 * @param bool|false $short_bio
 * @param bool $expertise
 * @param bool $unit
 * @return bool|string
 */
function layout_fipriot_team_member($post_id, $expertise = false, $unit = true, $position = true) {
    if( $post_id ) {
        $string = '';

        $string .= '<div class="team-member">';
            $string .= '<div class="profile-photo">';
                $string .= '<a href="' . get_the_permalink($post_id) . '">';
                    if ( has_post_thumbnail($post_id) ) {
                        $string .= '<img src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0] . '" alt="' . get_field('first_name', $post_id) . ' ' . get_field('last_name', $post_id) . '" class="photo-tile" />';
                    } else {
                        $string .= '<img src="' . get_template_directory_uri() . '/img/blank_profile_' . get_field('gender', $post_id) . '.png" alt="' . get_field('first_name', $post_id) . ' ' . get_field('last_name', $post_id) . '" title="' . get_field('first_name', $post_id) . ' ' . get_field('last_name', $post_id) . '" class="photo-tile" />';
                    }
                $string .= '</a>';
            $string .= '</div>';

            $string .= '<div class="profile-details">';
                $string .= '<h4 class="no-bottom-margin"><a href="' . get_the_permalink($post_id) . '">' . get_field('first_name', $post_id) . ' ' . get_field('last_name', $post_id) . '</a></h4>';
                if($position === true) {
	                if(get_field('is_special_adviser', $post_id)) {
		                $string .= '<h6>Special Adviser';
		                if(get_field('special_adviser_expertise')) $string .= '<br>' . get_field('special_adviser_expertise');
		                $string .= '</h6>';
	                } else {
		                $position_title           = get_field( 'position', $post_id );
		                $unit_id                  = get_field( 'unit', $post_id ) ? get_field( 'unit', $post_id )[0] : "";
		                $additional_position_info = get_field( 'additional_position_info' );
//                    Fipriot has either a position, unit or additional position info assigned?
		                if ( $position_title || $unit_id ) {
			                $string .= '<h6>';
			                if ( $position && $position_title ) {
				                $string .= $position_title;
			                };
			                if ( $position_title && $unit_id ) {
				                $string .= '<br>';
			                }
			                if ( $unit && $unit_id ) {
				                $string .= fiprafy_unit_name( get_the_title( $unit_id ) );
			                }
			                if ( ( $position_title || $unit_id ) && $additional_position_info ) {
				                $string .= ', ';
			                }
			                if ( $additional_position_info ) {
				                $string .= $additional_position_info;
			                }
			                $string .= '</h6>';
		                }
	                }
                }

    //            If $expertise is true, iterate through expertise areas and display an icon link for each one
                if( $expertise === true ) {
    //                Fipriot has expertise set?
                    if( get_field('expertise', $post_id) ) {
                        $string .= '<ul class="team-member-expertise">';
                        $string .= '<li>';
                        foreach(get_field('expertise', $post_id) as $expertise) {
                            $string .= '<a href="' . get_the_permalink($expertise) . '" class="tooltip svg-icon" title="' . get_the_title($expertise) . '">';
                            $string .= file_get_contents( get_field('icon', $expertise) );
                            $string .= '</a>';
                        }
                        $string .= '</li>';
                        $string .= '</ul>';
                    }
                }
            $string .=  '</div>';
        $string .=  '</div>';

    return $string;
    } else {
        return false;
    }
}


/**
 * Layout practice staff team members on expertise pages
 *
 * @param $fipriots
 * @return string
 */
function layout_practice_staff($fipriots) {
    $string = '';

    if ( $fipriots ) {

        foreach ( $fipriots as $fipriot ) {
            $string .= layout_fipriot_team_member($fipriot->ID);
        }
    }

    return $string;
}

/**
 * Layout team members on Unit pages
 *
 * @param $fipriots
 * @return string
 */
function layout_our_team($fipriots) {
    $string = '';

    if ( $fipriots ) {

        foreach ( $fipriots as $fipriot ) {
            $string .= layout_fipriot_team_member($fipriot->ID, true);
        }
    }

    return $string;
}

/**
 * Return the full name for the current Fipriot
 *
 * @return bool|string
 */
function full_name() {
    $first_name = get_field('first_name');
    $last_name = get_field('last_name');

    if($first_name && $last_name) { return $first_name . ' ' . $last_name; }
    return false;
}

/**
 * Return the URL to the flag image for the current language
 *
 * @param $term_id
 * @return array|false
 */
function get_language_flag_url($term_id) {

	// image id is stored as term meta
	$image_id = get_term_meta( $term_id, 'image', true );

// image data stored in array, second argument is which image size to retrieve
	$image_data = wp_get_attachment_image_src( $image_id, 'full' );

// image url is the first item in the array (aka 0)
	$image = $image_data[0];

	if ( ! empty( $image ) ) {
		return esc_url( $image );
	}

	return false;


    // Old term meta plugin logic
	/*$meta = get_option('flag_section');
    if (empty($meta)) $meta = array();
    if (!is_array($meta)) $meta = (array) $meta;
    $meta = isset($meta[$term_id]) ? $meta[$term_id] : array();
    if(isset($meta['image'])) {

        $images = $meta['image'];
        foreach ($images as $att) {
            // get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registered post thumbnails sizes
            $src = wp_get_attachment_image_src($att, 'full');
            $src = $src[0];

            // return URL
            return $src;
        }
    } else {
        return false;
    }*/
}

/**
 * Return the expertise type for the current spad_expertise term
 *
 * @param $term_id
 * @return array|false
 */
function get_spad_expertise_type($term_id) {


    $meta = get_option('expertise_type_section');
    if (empty($meta)) $meta = array();
    if (!is_array($meta)) $meta = (array) $meta;
    $meta = isset($meta[$term_id]) ? $meta[$term_id] : array();
    if(isset($meta['expertise_type'])) {
        return $meta['expertise_type'];
    } else {
        return false;
    }
}

//Get all individual expertise tags as applied to Spads. Separate by policy and location field if required.
function get_spad_expertise_tags($policy = false, $location = false) {
    $tags = get_tax_terms('spad_expertise');
    $expertise_areas = [];

    foreach($tags as $tag) {
        if(!in_array($tag->name, $expertise_areas)) {
            if($policy && get_spad_expertise_type($tag->term_id) == 'policy') {
                $expertise_areas[] = $tag->name;
            }
            if($location && get_spad_expertise_type($tag->term_id) == 'location') {
                $expertise_areas[] = $tag->name;
            }
        }
    }

    sort($expertise_areas);

    return $expertise_areas;
}

function get_search_results() {
    global $wp_query;
    return  $wp_query->found_posts;
}

function get_slug() {
    global $post;
    return $post->post_name;
}

//Convert a string to lowercase, keep letters, numbers and underscores only
//and add a prefix and/or suffix if required
function make_class_name($string, $prefix = '', $suffix = '') {
    if($string) {
        if($prefix) $prefix = $prefix . '-';
        if($suffix) $suffix = '-' . $suffix;
        $full_string = $prefix . $string . $suffix;

        // keep letters, numbers and underscores only
        return strtolower(preg_replace('/\W+/', '_', $full_string));
    }
}

//Add Fipra to a unit name
function fiprafy_unit_name($unit_name) {
    return trim('Fipra ' . str_ireplace('fipra', '', $unit_name));
}

//Get the opening sentence from a paragraph of text
function get_lead_paragraph($text) {
    $numMatches = strpos($text, '</p>') ? preg_match_all('|<p>(.+?)</p>|', $text, $matches) : 0; // Find all paragraph blocks

    if($numMatches) return strip_tags(preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $matches[1][0])); // Return the first line from the first paragraph

    return strip_tags(preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $text)); // No paragraphs so just return the first line from the text passed in
}

//Return all but the first sentence in a paragraph
function bio_minus_lead_paragraph($text) {
    $lead_para = trim(get_lead_paragraph($text));
    $text = strip_tags($text);
    $new_text = str_ireplace($lead_para, '', $text);

    return $new_text;
}

//Trim text to a specified length and add an elipsis
function trim_text($input, $length) {

    // If the text is already shorter than the max length, then just return unedited text.
    if (strlen($input) <= $length) {
        return $input;
    }

    // Find the last space (between words we're assuming) after the max length.
    $last_space = strrpos(substr($input, 0, $length), ' ');
    // Trim
    $trimmed_text = substr($input, 0, $last_space);
    // Add ellipsis.
    $trimmed_text .= '...';

    return $trimmed_text;
}

function get_current_page_template($page_template) {
    $pageTemplate = get_page_template();

    $pageArray = explode("/", $pageTemplate);

    return end($pageArray) == $page_template;
}

function get_id_by_slug($page_slug, $post_type = 'page', $output_type = OBJECT) {
    $page = get_page_by_path($page_slug, $output_type, $post_type);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

//Format Spad expertise tags into a nice user-friendly string
function format_spad_expertise_tags($tags)
{
    if(is_array($tags)) {

        $formatted_tags = '';
        $terms = [];

//        Get all tags and sort alphabetically
        foreach($tags as $tag_id)
        {
            array_push($terms, get_term_by('id', $tag_id, 'spad_expertise')->name);
        }

        sort($terms);

//        Create one string from all tags
        foreach($terms as $term)
        {
            $formatted_tags .= $term . ', ';
        }
//        Remove final comma and space, then return
        return substr($formatted_tags, 0, -2);
    } else {
        return false;
    }
}

//Get all terms for a taxonomy
function get_tax_terms($taxonomy, $orderby = 'name', $order = 'ASC', $hide_empty = false)
{
    $args = [
        'orderby' => $orderby,
        'order' => $order,
        'hide_empty' => $hide_empty,
    ];

    return get_terms($taxonomy, $args);
}

//Get a taxonomy term's name by its ID
function get_tax_term_name($tag_id, $taxonomy) {
    return get_term_by('id', $tag_id, $taxonomy)->name;
}

function autocomplete_spad_expertise() {
    $expertise_areas = get_tax_terms('spad_expertise');
    $autocomplete_data = [];

    foreach($expertise_areas as $area)
    {
        $autocomplete_data[] = ['value' => $area->name, 'data' => $area->name];
    }

    return json_encode($autocomplete_data);
}


//Create class names for each Spad expertise tag to be used by Isotope for filtering
function make_expertise_tag_classes($tags)
{
    $tag_classes = '';

    if(is_array($tags)) {
        foreach($tags as $tag_id) {
            $tag_classes .= 'expertise-' . make_class_name(get_tax_term_name($tag_id, 'spad_expertise')) . ' ';
        }

        return trim($tag_classes);
    }

    return false;
}


//Obfuscate an email address in a mailto link
function hide_email($email)

{ $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

    $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);

    for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];

    $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';

    $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';

    $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';

    $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")";

    $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';

    return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;

}

// Generate vCard and save to template directory
// Return path to created file
function create_fipriot_vcard()
{
    require('lib/VCard.php');

// define vcard
    $vcard = new vCard();

// define variables
   $data = [
       'first_name' => get_field('first_name'),
       'last_name' => get_field('last_name'),
       'display_name' => get_field('first_name') . ' ' . get_field('last_name'),
       'company' => 'Fipra',
       'url' => get_the_permalink(get_the_ID()),
   ];

//    Check for various available fields
//Email address info
    if(get_field('email')) {
        $data['email1'] = get_field('email');
    }

//    Contact details
    if(get_field('tel')) { $data['office_tel'] = get_field('tel'); }
    if(get_field('fax')) { $data['fax_tel'] = get_field('fax'); }
    if(get_field('address')) { $data['work_address'] = strip_tags(str_replace(PHP_EOL, '\n', get_field('address'))); }

//    Position and Unit / Special Adviser info
    if(get_field('is_special_adviser')) {
     $data['role'] = 'Special Adviser';
        $data['role'] .= get_field('special_adviser_expertise_tags') ? ' - ' . format_spad_expertise_tags(get_field('special_adviser_expertise_tags')) : '';
    } else {
        $data['role'] = get_field('position');
        if(get_field('position') && get_field('unit')[0]) {
            $data['role'] .= ', ';
        }
        $data['role'] .= get_field('unit')[0] ? fiprafy_unit_name(get_the_title(get_field('unit')[0])) : '';
        if((get_field('position') || get_field('unit')[0]) && get_field('additional_position_info')) { $data['role'] .= '; '; }
        if(get_field('additional_position_info')) { echo get_field('additional_position_info'); }
    }
//Set all Fipriot data
    $vcard->set('data', $data);

//    Get vCard directory and generate filename from Fipriot name
    $vcard_dir = get_template_directory() . '/vcards';
    $filename = sanitise_filename(strtolower(get_field('first_name') . '_' . get_field('last_name') . '.vcf'));
    if(file_put_contents($vcard_dir . '/' . $filename, $vcard->show()))
    {
//        Return path and filename if successful
        return get_template_directory_uri() . '/vcards/' . $filename;
    }
//    Failed?
    return false;
}

/**
 * Format an article's categories into a nicely presented string with links
 *
 * @param $categories
 *
 * @return string
 */
function format_article_categories($categories)
{
	$category_links = '';

	foreach($categories as $category) {
		$category_links .= ', <a href="' . get_category_link($category->cat_ID) . '">' . $category->name . '</a>';
	}

	return ltrim($category_links, ', ');

}

/**
 * Returns a string containing all tags with links
 *
 * @return string
 */
function format_sidebar_tags()
{
	$tags = get_tags();
	$html = '';
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );

		$html .= ", <a href='{$tag_link}' title='{$tag->name} Tag' class='sidebar-tag {$tag->slug}'>{$tag->name}</a>";
	}

	return ltrim($html, ', ');
}

/**
 * Returns a string containing an article's tags with links
 *
 * @return string
 */
function format_article_tags()
{
	if($tags = wp_get_post_tags(get_the_ID())) {
		$html = '';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );

			$html .= ", <a href='{$tag_link}' title='{$tag->name} Tag' class='sidebar-tag {$tag->slug}'>{$tag->name}</a>";
		}

		return ltrim($html, ', ');
	}

	return false;
}

function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
	$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
	$rgbArray = array();
	if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
		$colorVal = hexdec($hexStr);
		$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
		$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
		$rgbArray['blue'] = 0xFF & $colorVal;
	} elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
		$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
		$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
		$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
	} else {
		return false; //Invalid hex color code
	}
	return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}
function RGB2HSV ($R, $G, $B)  // RGB Values:Number 0-255
{                                 // HSV Results:Number 0-1
	$HSL = [];

	$var_R = ($R / 255);
	$var_G = ($G / 255);
	$var_B = ($B / 255);

	$var_Min = min($var_R, $var_G, $var_B);
	$var_Max = max($var_R, $var_G, $var_B);
	$del_Max = $var_Max - $var_Min;

	$V = $var_Max;

	if ($del_Max == 0)
	{
		$H = 0;
		$S = 0;
	}
	else
	{
		$S = $del_Max / $var_Max;

		$del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
		$del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
		$del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

		if      ($var_R == $var_Max) $H = $del_B - $del_G;
		else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
		else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;

		if ($H<0) $H++;
		if ($H>1) $H--;
	}

	$HSL['H'] = $H;
	$HSL['S'] = $S;
	$HSL['V'] = $V;

	return $HSL;
}
function HSV2RGB(array $hsv) {
	$H = $hsv['H'];
	$S = $hsv['S'];
	$V = $hsv['V'];

	//1
	$H *= 6;
	//2
	$I = floor($H);
	$F = $H - $I;
	//3
	$M = $V * (1 - $S);
	$N = $V * (1 - $S * $F);
	$K = $V * (1 - $S * (1 - $F));
	//4
	switch ($I) {
		case 0:
			list($R,$G,$B) = array($V,$K,$M);
			break;
		case 1:
			list($R,$G,$B) = array($N,$V,$M);
			break;
		case 2:
			list($R,$G,$B) = array($M,$V,$K);
			break;
		case 3:
			list($R,$G,$B) = array($M,$N,$V);
			break;
		case 4:
			list($R,$G,$B) = array($K,$M,$V);
			break;
		case 5:
		case 6: //for when $H=1 is given
			list($R,$G,$B) = array($V,$M,$N);
			break;
	}
	return array($R, $G, $B);
}

function RGB2hex($rgb) {
	$hex = "#";
	$hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
	$hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
	$hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

	return $hex; // returns the hex value including the number sign (#)
}

// Helps to work out the lightness of a colour, so we place suitable text over the top
function luma($rgb = [])
{
	return (0.2126 * $rgb['red'] + 0.7152 * $rgb['green'] + 0.0722 * $rgb['blue']) / 255;
}

function adjustColorLightenDarken($color_code,$percentage_adjuster = 0) {
	$percentage_adjuster = round($percentage_adjuster/100,2);
	if(is_array($color_code)) {
		$r = $color_code["r"] - (round($color_code["r"])*$percentage_adjuster);
		$g = $color_code["g"] - (round($color_code["g"])*$percentage_adjuster);
		$b = $color_code["b"] - (round($color_code["b"])*$percentage_adjuster);

		return array("r"=> round(max(0,min(255,$r))),
		             "g"=> round(max(0,min(255,$g))),
		             "b"=> round(max(0,min(255,$b))));
	}
	else if(preg_match("/#/",$color_code)) {
		$hex = str_replace("#","",$color_code);
		$r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
		$g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
		$b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
		$r = round($r - ($r*$percentage_adjuster));
		$g = round($g - ($g*$percentage_adjuster));
		$b = round($b - ($b*$percentage_adjuster));

		return "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
		       .str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
		       .str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);

	}
}

function subtleText($hex, $direction = 'lighter') {
	$palette = Palette::Hex($hex);
	if($direction == 'lighter') {
		$palette->addLum(0.5)->addSat(-0.8);
	} elseif($direction == 'darker') {
		$palette->addLum(-0.4)->addSat(-0.5);
	}

	return $palette->render();
}