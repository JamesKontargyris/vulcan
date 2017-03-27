<?php get_header(); ?>

<div id="content-container" class="job-listing">

    <div id="site-content-container">

        <div id="site-content">

            <!-- The Loop -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


	            <?php $post_id = get_the_ID(); ?>

                <div id="primary">
                    <main id="main" class="site-main" role="main">

                        <h1 class="no-margin"><?php the_title(); ?></h1>
                        <h4 class="no-top-margin">
                            <?php
                            echo get_field('location_information') ?  get_field('location_information') : '';
                            echo get_field('location_information') && get_field('salary_information') ? ', ' : '';
                            echo get_field('salary_information') ? get_field('salary_information') : '';
                            ?>
                        </h4>
                        <?php echo get_field('closing_date') ? '<h5>Closes ' . date('d M Y', strtotime(get_field('closing_date'))) . '</h5>' : ''; ?>

                        <hr class="small"/>
                        <?php if(get_field('lead_paragraph')) : ?>
                            <p class="lead black-text"><?php echo get_field('lead_paragraph'); ?></p>
                        <?php endif; ?>

                        <?php the_content(); ?>

                    </main><!-- #main -->
                </div><!-- #primary -->

                <div id="secondary">
                    <?php require('inc/lead_contacts.php'); ?>

                    <?php if(get_field('include')) : ?>
                        <aside>
                            <h5>Please include:</h5>
                            <ul class="bullets">
                                <?php $requirements = explode("\n", get_field('include')); ?>
                                <?php foreach($requirements as $requirement) : ?>
                                    <li><?php echo $requirement; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </aside>
                    <?php endif; ?>
                </div><!-- #secondary -->

        <?php endwhile; endif; ?>

        </div><!-- #content -->
    </div>
</div><!-- #content-container   -->

<?php get_footer(); ?>

<div id="modal">
    This pop-up will contain contact details for the relevant person.
</div>
