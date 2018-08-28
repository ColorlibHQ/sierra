<?php
	
	/*----------------------------------------
	Instagram Photo Widget 
	----------------------------------------*/
	class sierra_instagram_photo extends WP_Widget {
		public function __construct(){
			parent::__construct('sierra_instagram_photo',esc_html__('Sierra Intagram Photo','sierra'),array(
			'description' => esc_html__('Sierra Instagram Photo Widget','sierra'),
			));
		}
		public function widget($args,$instance){
			
			$title = $args['before_title'];
			$title .= $instance['title'];
			$title .=$args['after_title'];
			$insta_user = esc_html($instance['insta_user']);
			$insta_items = esc_html($instance['insta_items']);
			?>
			
				<?php 
				print $args['before_widget'];
				print($title); ?>
				<div class="cp-module-inner">
					<div class="cp-instagram-photos" data-username="<?php print $insta_user ?>" data-items="<?php print $insta_items ?>"></div>
				</div>
			<?php print $args['after_widget'];
		}
		
		public function form($instance){
			$data = array(
				'title' => isset($instance['title'])?$instance['title']:esc_html('Instagram', 'sierra'),
				'insta_user' => isset($instance['insta_user'])?$instance['insta_user']:'remonfoysal',
				'insta_items' => isset($instance['insta_items'])?$instance['insta_items']:'6',
			);
			
			foreach($data as $key =>$value){
				if($key=='insta_user') {
					echo '<p><label for="insta_user">'.esc_html__('Instagram Username','sierra').'</label></p>
						<input type="text" id="insta_user"  name="'.$this->get_field_name($key).'" value="'.$value.'">';
				}
				else if($key == 'insta_items'){
					echo '<p><label for="insta_items">'.esc_html__('Show Items','sierra').'</label></p>
						<input type="number" id="insta_items"  name="'.$this->get_field_name($key).'" value="'.$value.'">';
				}
				else{
					echo '<p><label for="title">'.ucfirst($key).'</label></p>
						<input type="text" id="'.$this->get_field_id($key).'"  name="'.$this->get_field_name($key).'" value="'.$value.'">';
				}
				
			}
		}
	}
	
	/*----------------------------------------
	Register these widgets
	----------------------------------------*/
	
	if(!function_exists('sierra_instagram_widgets')):
		function sierra_instagram_widgets(){
			register_widget('sierra_instagram_photo');
		}
		add_action('widgets_init','sierra_instagram_widgets');
	endif;
	
	