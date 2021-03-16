<?php
 
class Latest_Posts extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'latest-posts',  // Base ID
            'Latest Posts with thumbnail'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Latest_Posts' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="widget-posts">';
 
 
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'category_name' => 'Uncategorized', 'no_posts' => 5));
        $title = esc_attr($instance['title']);
        $category_name = esc_attr($instance['category_name']);
        $no_posts = intval($instance['no_posts']);
        $categories = &get_categories('type=post&orderby=name&hide_empty=0');
		?>		 
		 
		<label for="<?php echo $this->get_field_id('title'); ?>">
            Title
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </label>
		<br/>
        
        <label for="<?php echo $this->get_field_id('category_name'); ?>">
            Category Name
            <select name="<?php echo $this->get_field_name('category_name'); ?>" id="<?php echo $this->get_field_id('category_name'); ?>" class="widefat">
                <?php											
                    if ($categories) {
                        foreach ($categories as $category) {
                            $selected = ($category->category_name == $category_name ) ? ' selected' : '';
                            echo '<option value="' . $category->category_name . '"' . $selected . '>' . $category->category_name . '</option>' . "\n";
                        }
                    }
                ?>
            </select>
        </label>
        <br/>

		<label for="<?php echo $this->get_field_id('no_posts'); ?>">
            Numer of Posts to Display
            <input class="widefat" id="<?php echo $this->get_field_id('no_posts'); ?>" name="<?php echo $this->get_field_name('no_posts'); ?>" type="text" value="<?php echo $no_posts; ?>" />
        </label>
		<br/>

	<?php }
 
    public function update( $new_instance, $old_instance ) { 
        $instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category_name'] = strip_tags($new_instance['category_name']);
		$instance['no_posts'] = intval($new_instance['no_posts']);
 
        return $instance;
    }
 
}

$latest_posts = new Latest_Posts();
