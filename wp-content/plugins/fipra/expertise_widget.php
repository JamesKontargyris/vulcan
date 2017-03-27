<?php
class Expertise_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        parent::__construct(
            'expertise_widget', // Base ID
            __( 'Areas of Expertise', 'fipradotcom' ), // Name
            array( 'description' => __( 'Generates a list of expertise areas', 'fipradotcom' ), ) // Args
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        $expertise = get_expertise_areas();
        $string = '';

        if($expertise->have_posts()) {

            $string .= '<ul class="sidebar-list no-bottom-margin no-bullet">';
            while($expertise->have_posts()) {
                $expertise->the_post();

                $string .= '<li><a href="' . get_the_permalink() . '"><div class="svg-icon svg-blue margin-r">';
                $string .= '<img class="svg" src="' . get_field('icon') . '" alt="">';
                $string .= '</div>';
                $string .= get_the_title();
                $string .= '</a></li>';
            }
            $string .= '</ul>';
        }

        echo $string;

        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     * @return string|void
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'fipradotcom' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
}

add_action( 'widgets_init', function(){
    register_widget( 'Expertise_Widget' );
});