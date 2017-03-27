<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php include('inc/header_featured_image.php'); ?>

    <?php get_template_part('inc/breadcrumbs'); ?>

    <div id="content-container">

        <?php include('inc/hero_banner.php'); ?>

        <section id="pa-campaigns" class="full-width-block-container">
            <div class="full-width-block-content-container periwinkle">
                <div class="full-width-block-content">
                    <div class="row">
                        <div class="col-12-m">
                            <h1 class="upper small center">General PA Campaigns</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6-m no-bottom-margin">

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla efficitur euismod lobortis. Integer facilisis tellus libero. Duis vitae pellentesque ligula, a tempor ex. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam erat volutpat. Duis congue dictum nisl at semper. Mauris congue tempus ipsum in sodales. Accusamus doloremque, ex illum libero quibusdam tempore voluptate.</p>

                        </div>
                        <div class="col-6-m no-bottom-margin">

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate enim error ex in magnam molestiae optio! Commodi consequuntur deserunt exercitationem explicabo facilis incidunt nisi repellat sequi sit voluptatem. Accusamus alias aliquam, aliquid amet assumenda beatae consequuntur dolores earum, eos, et fugiat ipsa iure maxime possimus quasi rerum sapiente.</p>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="areas-of-expertise" class="full-width-block-container areas-of-expertise-block">
            <div class="full-width-block-content-container dark-grey">
                <div class="full-width-block-content">
                    <div class="row">
                        <div class="col-12-l no-m-margin">
                            <h1 class="upper small center">Areas of Expertise</h1>
                        </div>
                    </div>

                    <?php echo do_shortcode('[areas_of_expertise_menu_and_list]'); ?>

                </div>
            </div>
        </section>

    <section id="public-affairs-services" class="full-width-block-container public-affairs-services-block">
        <div class="full-width-block-content-container light-grey">

            <h1 class="upper small center">Public Affairs Services</h1>
            <div class="full-width-block-content left">

                <?php echo do_shortcode('[pa_services_carousel]'); ?>

            </div>
        </div>
    </section>

</div><!-- #content-container   -->

<?php endwhile; ?>

<?php get_footer(); ?>

<div id="modal">
    This pop-up will contain contact details for the relevant person.
</div>