<?php

// Shortcode functions and registrations

/**
 * Display the areas of expertise on the homepage
 *
 * @return string
 */
function home_areas_of_expertise_sc() {
$expertise = get_expertise_areas(true); // true indicates that only areas marked as for display on the homepage should be shown
$string = '';

if($expertise->have_posts()) {

while($expertise->have_posts()) {
$expertise->the_post();

$string .= '<div class="showcase-block">';
    $string .= '<a href="' . get_the_permalink() . '"><div class="svg-icon margin-r">';
            $string .= '<img class="svg" src="' . get_field('icon') . '" alt="">';
            $string .= '</div></a>';
    $string .= '<div>';
        $string .= '<h4 class="no-margin"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
        $string .= '<p>' . get_field('short_introduction') . '</p>';
        $string .= '</div>';
    $string .= '</div>';
}
}

return $string;
}
add_shortcode( 'home_areas_of_expertise', 'home_areas_of_expertise_sc' );




/**
* Display Fipriots that are marked as available on the homepage in a carousel
* @return string
*/
function home_fipriots_sc() {
$fipriots = get_homepage_fipriots();
$string = '';

if ( $fipriots->have_posts() ) {
$string .= '<div id="our-people-carousel" class="team-carousel with-controls" data-number-of-items="' . $fipriots->found_posts . '">';

    while ( $fipriots->have_posts() ) {
    $fipriots->the_post();

    $string .= layout_fipriot_team_member(get_the_ID());
    }

    $string .=  '</div>';
}

return $string;
}
add_shortcode( 'home_fipriots', 'home_fipriots_sc' );


/**
 * Display the testimonials template for the current page.
 * Can be used as a template function.
 *
 * @return bool|string
 */
function page_testimonials() {
//    Get the ID of the current page
    $page_id = get_master_page_id();

//    Get the testimonials assigned to this page
    $page_testimonials = get_field('testimonials', $page_id);
    $string = '';

    if ( $page_testimonials ) {
        $string .= '<div class="full-width-block-container" style="background:url(' . get_template_directory_uri() . '/img/bg_quotemarks.jpg) center no-repeat; background-size:cover;">';
        $string .= '<div class="full-width-block-content-container large-padding custom-bg--tertiary-translucent">';
        $string .= '<div class="full-width-block-content custom-text--tertiary-contrast">';
        if(get_field('testimonials_title', $page_id)) { $string .= '<h5 class="center">' . get_field('testimonials_title', $page_id) . '</h5>'; }
        $string .= '<div id="testimonial-carousel" class="testimonial-group carousel">';

        foreach($page_testimonials as $t) {
//                          Get the id of the current post object (testimonial object)
            $t_id = $t->ID;

            $string .= '<blockquote class="testimonial">';
            $string .= '<div class="quote"><em>&quot;' . get_field('quote', $t_id) . '&quot;</em></div>';
            $string .= '<footer class="author">';
            $string .= '<div class="author-details">';
            $string .= '<span class="name">' . get_field('name', $t_id) . '</span><br/>';
            if (get_field('position', $t_id)) $string .= get_field('position', $t_id);
            if (get_field('position', $t_id) && get_field('company_organisation', $t_id)) $string .= ', ';
            if (get_field('company_organisation', $t_id)) $string .= get_field('company_organisation', $t_id);
            $string .= '</div>';
            $string .= '</footer>';
            $string .= '</blockquote>';
        }

        $string .= '</div>';
        $string .= '</div>';
        $string .= '</div>';
        $string .= '</div>';

        return $string;
    }

    return false;

}
add_shortcode( 'page_testimonials', 'page_testimonials' );

/**
 * Display Units grouped by continent
 */
function our_network_sc() {
//    Buffer output and return the buffered content, so it appears in the correct position on the page
    ob_start();
    include(get_template_directory() . '/inc/our_network.php');
    $output = ob_get_clean();
    return $output;
}
add_shortcode( 'our_network_by_continent', 'our_network_sc' );

function get_job_listings_sc() {
    $job_listings = get_all_jobs();
    $string = '';

    if($job_listings->have_posts()) {
        $job_text = $job_listings->found_posts == 1 ? 'vacancy' : 'vacancies';

        $string .= '<h4>' . $job_listings->found_posts . ' ' . $job_text . '</h4>';

        while($job_listings->have_posts()) {
            $job_listings->the_post();

            $string .= '<div class="job-listing-block">
                            <div class="row">
                                <div class="col-8-m no-bottom-margin">';
                                    $string .= '<div class="job-listing-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
                                    $string .= '<div class="job-listing-meta">';
                                        $string .= get_field('location_information') ?  get_field('location_information') : '';
                                        $string .= get_field('location_information') && get_field('salary_information') ? ', ' : '';
                                        $string .= get_field('salary_information') ? get_field('salary_information') : '';
                                    $string .= '</div>';
                                $string .= '</div>';
                                $string .= '<div class="col-4-m no-bottom-margin">';
                                    $string .= '<div class="job-listing-timestamp">Posted: <strong>' . date('d M Y', strtotime(get_the_date())) . '</strong>';
                                    $string .= get_field('closing_date') ? '<br/>Closes: <strong>' . date('d M Y', strtotime(get_field('closing_date'))) . '</strong>' : '';
                                    $string .= '</div>';
                                $string .= '</div>';
                            $string .= '</div>';
                            $string .= '<div class="row">';
                                $string .= '<div class="job-listing-overview">';
                                    $string .= '<p>' . get_field('summary') . '</p>';
                                    $string .= '<p class="no-margin"><a href="' . get_the_permalink() . '" class="btn btn-extra-small primary">Read more</a></p>';
                                $string .= '</div>';
                            $string .= '</div>';
                    $string .= '</div>';
        }

        return $string;
    } else {
//        return '<h4>No vacancies at this time.</h4>';ssh homestead
        return '';
    }
}
add_shortcode( 'job_listings', 'get_job_listings_sc' );

function areas_of_expertise_menu_and_list_sc() {
    $expertise_areas = get_expertise_areas();
    $string = '';

    if ( $expertise_areas->have_posts() ) {
        $string .= '<div class="menu-list-and-entries-block">';
                $string .= '<div class="row">';
                    $string .= '<div class="col-5-l">';
                        $string .= '<ul class="menu-list with-line" data-entry-group="1">';
                            $i = 0; foreach ( $expertise_areas->get_posts() as $expertise_area ) : $i++; $expertise_id = $expertise_area->ID;
                            $class_active = ($i == 1) ? 'class="active"' : '';
                            $string .= '<li ' . $class_active . '><a href="#entry-' . $i . '">';
                            $string .= '<div class="svg-icon margin-r"><img class="svg" src="' . get_field('icon', $expertise_id) . '" alt=""></div>';
                            $string .= get_the_title($expertise_id);
                            $string .= '</a></li>';
                            endforeach;
                        $string .= '</ul>';
                    $string .= '</div>';

                    $string .= '<div class="col-7-l entry-group" id="entry-group-1">';
                        $i = 0; $expertise_areas->rewind_posts(); // start again at the beginning
                            foreach ( $expertise_areas->get_posts() as $expertise_area ) : $i++; $expertise_id = $expertise_area->ID;
                                $string .= '<div class="entry" id="entry-' . $i . '">';
                                    $string .= '<div class="entry-title">';
                                        $string .= '<h4 class="no-margin">';
    //                                        $string .= '<div class="svg-icon margin-r"><img class="svg" src="' . get_field('icon', $expertise_id) . '" alt=""></div>';
                                            $string .= get_the_title($expertise_id);
                                            $string .= '<i class="icon-toggle icon-down-open"></i>';
                                        $string .= '</h4>';
                                    $string .= '</div>';
                                    $string .= '<div class="entry-content">';
                                        $string .= get_field('long_summary', $expertise_id);
                                        if(get_field('link_to_page', $expertise_id)) {
                                            $string .= '<p style="padding-top:24px"><a href="' . get_the_permalink($expertise_id) . '" class="btn primary">Read more</a></p>';
                                        }
                                    $string .= '</div>';
                                $string .= '</div>';
                            endforeach;
                    $string .= '</div>';
                $string .= '</div>';
        $string .= '</div>';
    } else {
        $string .= '<span style="text-align: center">Areas of Expertise coming soon</span>';
    }

    return $string;
}
add_shortcode( 'areas_of_expertise_menu_and_list', 'areas_of_expertise_menu_and_list_sc' );

function pa_services_carousel_sc() {
    $pa_services = get_public_affairs_services();
    $string = '';

    if ( $pa_services->have_posts() ) {
        $string .= '<div id="public-affairs-services-carousel" class="carousel with-controls">';

        while ($pa_services->have_posts()) : $pa_services->the_post();
            $string .= '<div>';
            $string .= '<h2 class="no-top-margin center">' . get_the_title() . '</h2>';
            $string .= '<p class="center">' . get_field('description') . '</p>';
            if ($contact_id = get_field('fipriot_contact')) {
                $string .= '<p class="center">Contact <a href="' . get_the_permalink($contact_id->ID) . '" class="pa-service-ajax-contact" data-modal-url="' . get_template_directory_uri() . '/paservice_contact_details.php?id=' . $contact_id->ID . '">' . get_field('first_name', $contact_id->ID) . ' ' . get_field('last_name', $contact_id->ID) . '</a> for more information.</p>';
            }
            $string .= '</div>';
        endwhile;
        $string .= '</div>';
    } else {
        $string .= '<span style="text-align: center">Coming soon</span>';
    }

    return $string;
}
add_shortcode( 'pa_services_carousel', 'pa_services_carousel_sc' );