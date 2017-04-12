<?php

/**
 * Widget to display popular or recent news stories
 *
 */
class Popular_Recent_News_Stories_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_options = array(
			'classname' => 'popular_recent_news_stories_widget',
			'description' => 'Display popular or recent news stories.',
		);
		parent::__construct( 'popular_news_stories_widget', 'Popular / Recent News Stories', $widget_options );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		if($instance['count'] >= 1) {

			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}

			$articles = ($instance['show'] == 'popular') ? get_popular_articles_for_widget( $instance['count'] ) : get_recent_articles_for_widget( $instance['count'] );

			if($articles->have_posts()) :
				while($articles->have_posts()) : $articles->the_post(); ?>
                    <div class="sidebar-article-extract">
						<?php if(has_post_thumbnail()) : ?>
                            <a href="<?php echo get_the_permalink(); ?>"><img class="sidebar-article-extract__image" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'article'); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></a>
						<?php endif; ?>
                        <div class="sidebar-article-extract__headline"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></div>
                        <div class="sidebar-article-extract__meta">
							<?php echo get_the_date('d M Y'); ?>
                        </div>
                    </div>
				<?php endwhile; ?>
			<?php else : ?>
                No news stories to display.
			<?php endif; ?>

			<?php
            echo $args['after_widget'];
		}
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'fipra' );
		$count = ! empty( $instance['count'] ) ? $instance['count'] : __( '5', 'fipra' );
		$show = ! empty( $instance['show'] ) ? $instance['show'] : 'recent';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show' ) ); ?>"><?php _e( esc_attr( 'Show:' ) ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'show' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show' ) ); ?>" style="width:100%;">
				<option value="recent" <?php if($show == 'recent') : ?>selected<?php endif; ?>>Recent News Stories</option>
				<option value="popular" <?php if($show == 'popular') : ?>selected<?php endif; ?>>Popular News Stories</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php _e( esc_attr( 'Number of stories to display:' ) ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="number" value="<?php echo esc_attr( $count ); ?>">
		</p>
		<?php
	}

	/**
	 * Processing and sanitising widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = [];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( (int) $new_instance['count'] ) : '';
		$instance['show'] = ( ! empty( $new_instance['show'] ) ) ? strip_tags( $new_instance['show'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'Popular_Recent_News_Stories_Widget' );
});
