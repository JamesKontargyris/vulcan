<div class="team-group-container">

	<div class="team-group">

		<?php $team = get_all_team_members(); // get all Fipriots assigned to Fipra International ?>
		<?php foreach($team as $member) : // loop through array of Fipriot IDs ?>

			<?php $post_id = $member->ID; ?>

			<?php
//                                        Assign variables
			$first_name = get_field('first_name', $post_id); $last_name = get_field('last_name', $post_id); $position = get_field('position', $post_id); $bio = get_field('bio', $post_id); $short_bio = get_field('short_bio', $post_id)
			?>

			<div id="surname-<?php echo substr($last_name, 0, 1); ?>" class="team-member <?php echo ' surname-' . substr($last_name, 0, 1); ?>">
				<div class="row">
					<div class="col-3 no-bottom-margin">
						<?php if ( has_post_thumbnail($post_id) ) : ?>
							<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'profile-photo' )[0]; ?>" alt="<?php echo $first_name; ?> <?php echo $last_name; ?>" title="<?php echo $first_name; ?> <?php echo $last_name; ?>" class="photo-tile team-member__photo" />
						<?php else : ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/blank_profile_<?php echo get_field('gender', $post_id); ?>.png" alt="<?php echo $first_name; ?> <?php echo $last_name; ?>" title="<?php echo $first_name; ?> <?php echo $last_name; ?>" class="photo-tile team-member__photo" />
						<?php endif; ?>
					</div>
					<span class="col-9">
						<h2 class="team-member__name"><a href="<?php echo get_the_permalink($post_id); ?>"><?php echo full_name($post_id); ?></a></h2>
						<?php if($position) : ?><h4 class="team-member__position"><?php echo $position; ?></h4><?php endif; ?>
						<?php if($short_bio) : ?><p class="team-member__short-bio"><?php echo $short_bio; ?> <a
							href="<?php echo get_the_permalink($post_id); ?>">Read more <i class="icon-right-circle"></i></a></p><?php endif; ?>
					</span>
				</div>
			</div>

		<?php endforeach; ?>

	</div>
</div>