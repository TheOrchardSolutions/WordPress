<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://line35.com
 * @since      1.0.0
 *
 * @package    Gravityforms_Autocomplete
 * @subpackage Gravityforms_Autocomplete/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gravityforms_Autocomplete
 * @subpackage Gravityforms_Autocomplete/admin
 * @author     line35 <info@line35.com>
 */
class Gravityforms_Autocomplete_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	
	
	public $ptype = array();
	
	public $tax = array();
	 
	 
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gravityforms_Autocomplete_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gravityforms_Autocomplete_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gravityforms-autocomplete-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gravityforms_Autocomplete_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gravityforms_Autocomplete_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gravityforms-autocomplete-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function add_autocomplete_field( $field_groups ) {
		
		foreach ( $field_groups as &$group ) {
			if ( $group['name'] == 'advanced_fields' ) {
				$group['fields'][] = array(
					'class'     => 'button',
					'data-type' => 'autocomplete',
					'type' => 'autocomplete',
					'value'     => __( 'Auto Suggest', 'gravityforms' ),
					'onclick'   => "StartAddField('autocomplete');"
				);
				break;
			}
		}

		return $field_groups;

		
	}
	
	public function add_autocomplete_field_title($type) {
	
		if ( $type == 'autocomplete' ) {
			return __( 'Autocomplete' ,  'gravityforms' );
		}
	
	}
	

	public function add_autocomplete_custom_fields( $input, $field, $value, $lead_id, $form_id ) {
	
		if($field->type == 'autocomplete') {
			$disabled = '';
			$choices = '';
			$url = '';
			
			$data = isset($field['field_auto']) ?  $field['field_auto'] : '';
			
			if(is_admin())
				$disabled = 'disabled="disabled"';
			
			if(isset($field->field_manual)) {
				$choices = "data-choices='".json_encode(preg_split('/\r\n|[\r\n]/', $field->field_manual)). "'";
			}
			
			if(isset($field->field_ajax)) {
				$url = "data-ajax='".$field->field_ajax."'";
			
			}
			
			
			$input_name = $form_id .'_' . $field["id"];
			$tabindex = GFCommon::get_tabindex();
			$css = isset( $field['cssClass'] ) ? $field['cssClass'] : '';
			return sprintf("<div class='ginput_container'>
										<input name='input_%s' id='%s' class='input gform_autocomplete %s'  type='text' value='%s' %s %s  %s placeholder='%s'/>
									</div>",
									$field["id"],
									'autocomplete-'.$field['id'],
									$field["type"] . ' ' . esc_attr( $css ) . ' ' . $field['size']. ' ' .$data . ' ' . $field->field_from,
									esc_html($value),
									$disabled, 
									$choices,
									$url,
									$field->placeholder
			);
		}
	}
	
	public function add_autocomplete_editor_js() {
	
		echo '<script type="text/javascript">

				jQuery(document).ready(function() {
					fieldSettings["autocomplete"] = ".label_setting, .description_setting, .admin_label_setting, .size_setting, .default_value_textarea_setting, .error_message_setting, .css_class_setting, .visibility_setting,.conditional_logic_field_setting, .placeholder_setting, .label_placement_setting, .prepopulate_field_setting, .duplicate_setting, .rules_setting, .l35_auto, .l35_from"; 
				});
							
				jQuery(document).bind("gform_load_field_settings", function(event, field, form){
					if(field["type"] == "autocomplete") {
						jQuery("#field_auto option[value=" + field["field_auto"] + "").attr("selected","selected");
						jQuery("#field_from option[value=" + field["field_from"] + "").attr("selected","selected");
						jQuery("#field_manual").val(field["field_manual"]);
						jQuery("#field_ajax").val(field["field_ajax"]);
						
						jQuery(".l35_options").hide();
							jQuery(".l35_"+field["field_from"]+"").show();
						
						jQuery("#field_from").change(function() {
							jQuery(".l35_options").hide();
							var el = jQuery(this);
							el.parent().parent().find(".l35_"+el.val()+"").show();
						});
					}
				});
				jQuery(document).bind( "gform_field_added", function( event, form, field ) {
					if(field["type"] == "autocomplete") {
						jQuery("#field_from option[value=from]").attr("selected","selected");
					}
				} );
				
				
			
			</script>';
	}
	
	function add_autocomplete_custom_settings( $position, $form_id ){
		if( $position == 50){
			?>
			<li class="l35_auto l35_options field_setting">
				<label for="field_autocomplete_data">
					Select Data for Autocomplete
					<?php gform_tooltip(
						"<h6>Select Data for Autocomplete</h6>Get options for autocomplete using WordPress sources. You can use WordPress taxonomies, posts or users."
					); ?>
				</label>
			<select class="fieldwidth-3"  id="field_auto" onchange="SetFieldProperty( 'field_auto', jQuery(this).val());" >
				<option value="auto">Select Data Source</option>
				<option value="user">User</option>
				<?php $type_ignore = array('revision','attachment','nav_menu_item');
					$post_types = get_post_types(); 
					foreach($post_types as $type): 
						if(!in_array($type,$type_ignore)): ?>
							<option value="<?php echo $type ?>"><?php echo ucfirst($type) ?> (Post Type)</option>
						<?php endif; ?>
					<?php endforeach; ?>
					<?php $taxonomy_ignore = array('revision','attachment','nav_menu_item');
					$taxonomies = get_taxonomies(); 
					foreach($taxonomies as $taxonomy): 
						if(!in_array($taxonomy,$taxonomy_ignore)): ?>
							<option value="<?php echo $taxonomy  ?>"><?php echo ucwords(str_replace('_',' ',$taxonomy)) ?> (Taxonomy)</option>
						<?php endif; ?>
					<?php endforeach; ?>
			</select>
			</li>
		<?php 
		}
		if( $position == 75){
			?>
			<li class="l35_manual l35_options field_setting">
				<label for="field_manual">
					Enter Data for Autocomplete
					<?php gform_tooltip(
						"<h6>Enter Data for Autocomplete</h6>Enter options for autocomplete. Enter only one option per line. "
					); ?>
				</label>
			<textarea id="field_manual" onkeyup="SetFieldProperty( 'field_manual', jQuery(this).val());" class="fieldwidth-3 fieldheight-2"></textarea>
			</li>
		<?php 
		}
		
		if( $position == 100){
			?>
			<li class="l35_ajax l35_options field_setting">
				<label for="field_ajax">
					Enter URL for Autocomplete
					<?php gform_tooltip(
						"<h6>Enter URL for Autocomplete</h6>Get options for autocomplete using AJAX. Enter  url which returns data in json format."
					); ?>
				</label>
			<input class="fieldwidth-3" type="text" id="field_ajax" onkeyup="SetFieldProperty( 'field_ajax', jQuery(this).val());">
			</li>
		<?php 
		}
		
		if( $position == 25 ){
		?>
		<li class="l35_from field_setting">
			<label for="field_from">
				Where to Get Options?
				<?php gform_tooltip(
					"<h6>Where to get options?</h6>Select where to get options you want. WordPress, URL or Manually."
				); ?>
			</label>
		<select class="fieldwidth-3"  id="field_from" onchange="SetFieldProperty( 'field_from', jQuery(this).val());" >
			<option value="from">Select From</option>
			<option value="auto">WordPress</option>
			<option value="ajax">URL (json)</option>
			<option value="manual">Manually</option>
		</select>
		</li>
		<?php 
		}
		
		
		
	}
	
	public function add_autocomplete_scripts( $form, $ajax ) {
			
		$data = array();
		$data['sources'] = array();
		foreach ( $form['fields'] as $field ) {
			if ( ( $field['type'] == 'autocomplete' ) ) {
				$url = plugin_dir_url( __FILE__ ) . 'js/gravityforms-autocomplete-admin.js';
				$plugin = plugin_dir_url( __FILE__ ) . 'js/jquery.auto-complete.min.js';
				wp_enqueue_script( "gf_autocomplete-plugin", $plugin , array("jquery"), '1.0' );
				wp_enqueue_script( "gf_autocomplete", $url , array("jquery"), '1.0' );
				break;
			}
		}
		
		
		$post_types = get_post_types(); 
		foreach($post_types as $type): 
			 $this->ptype[] = $type; 
		endforeach;

		
		$taxonomies = get_taxonomies(); 
		foreach($taxonomies as $taxonomy): 
			$this->tax[] = $taxonomy;
		endforeach;
		
		
		foreach ( $form['fields'] as $field ) {
			if(isset($field['field_auto'])) {
				if(in_array($field['field_auto'],$this->ptype)) {
					if(!array_key_exists($field['field_auto'],$data['sources'])) {
						$data['sources'][$field['field_auto']] =  $this->autocomplete_post_types($field['field_auto']);
					}
				}
			}
		}		
		
		foreach ( $form['fields'] as $field ) {
			if(isset($field['field_auto'])) {
				if(in_array($field['field_auto'],$this->tax)) {
					if(!array_key_exists($field['field_auto'],$data['sources'])) {
						$data['sources'][$field['field_auto']] =  $this->autocomplete_taxonomies($field['field_auto']);
					}
				}
			}
		}
		
		$data['sources']['user'] = $this->autocomplete_users();
		wp_localize_script( 'gf_autocomplete', 'l35', $data);
	}
	
	public function autocomplete_post_types($type) {
	
		$dataArray  = array();
		
		$args = array(
			'posts_per_page'   => 5,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => $type,
			'post_status'      => 'publish',
		);
		
		$data = get_posts( $args );
		
		foreach($data as $item) {
			$dataArray[] = $item->post_title;	
		}
		
		return $dataArray;
	
	}
	
	public function autocomplete_taxonomies($type) {
	
		$dataArray  = array();
		
		
		$data =  get_terms( $type , 'orderby=count&hide_empty=0' );
		
		foreach($data as $item) {
			$dataArray[] = $item->name;	
		}
		
		return $dataArray;
	
	}
	
	
	public function autocomplete_users() {
		
		$dataArray = array();
		
		$data = get_users();
		foreach($data as $item) {
			$dataArray[] = $item->display_name;
		}
		
		return $dataArray;
		
	}

}