<?php if($lead_contacts = get_field('lead_contact')) : ?>
    <div class="sidebar-contacts-container">
<!--        --><?php //if(count($lead_contacts) == 1) : ?>
<!--            <h5 id="get-in-touch">First Point of Contact</h5>-->
<!--        --><?php //else : ?>
<!--            <h5 id="get-in-touch">First Points of Contact</h5>-->
<!--        --><?php //endif; ?>
        <h5 id="get-in-touch">Please contact:</h5>
        <div class="sidebar-contacts-group">

            <?php foreach($lead_contacts as $lead) : ?>
                <div class="sidebar-contact">
                    <div class="sidebar-contact-content">

                        <a href="<?= get_the_permalink($lead->ID); ?>">
                            <?php if ( has_post_thumbnail($lead->ID) ) : ?>
                                <img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'profile-photo' )[0]; ?>" alt="<?= $lead->first_name . ' ' . $lead->last_name ?>" title="<?= $lead->first_name . ' ' . $lead->last_name ?>" class="photo-tile"/>
                            <?php endif; ?>
                            <strong><?= $lead->first_name . ' ' . $lead->last_name ?></strong>
                        </a>

                        <?php if($email = get_field('email', $lead->ID)) : ?>
                            <br><?php echo hide_email($email) ?>
                        <?php endif; ?>

                        <?php $tel = get_field('tel', $lead->ID); ?>
                        <?php if($tel) : ?>
                            <br><span class="font-14">Tel. <?= get_field('tel', $lead->ID) ?></span>
                        <?php endif; ?>

                        <?php $mobile = get_field('mobile', $lead->ID); ?>
                        <?php if($mobile) : ?>
                            <!--                                            <br><span class="font-14">Mob. get_field('mobile', $lead->ID)</span>-->
                        <?php endif; ?>

                        <?php $fax = get_field('fax', $lead->ID); ?>
                        <?php if($fax) : ?>
                            <br><span class="font-14">Fax. <?= get_field('fax', $lead->ID) ?></span>
                        <?php endif; ?>
                        <div class="contact-button">
                            <a href="/contact-fipriot?person=<?php echo get_field('first_name', $lead->ID) ?><?php echo get_field('last_name', $lead->ID) ?>&fipriot_id=<?php echo $lead->ID; ?>" class="btn primary btn-small btn-white">Contact <?php echo get_field('first_name', $lead->ID) ?></a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>