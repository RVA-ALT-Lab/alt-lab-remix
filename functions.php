<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';


add_action('wp_enqueue_scripts', 'google_fonts');
function google_fonts() {
	$query_args = array(
		'family' => 'Roboto:300,400,700|Old+Standard+TT:400,700|Oswald:400,500,700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style ( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }



add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    // wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'child-understrap-custom-scripts', get_stylesheet_directory_uri() . '/js/custom.js', array(), $the_theme->get( 'Version' ), true );

}




//CUSTOM POST TYPES

// Register Custom Post Type project
// Post Type Key: project
function create_project_cpt() {

	$labels = array(
		'name' => __( 'Projects', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Project', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Projects', 'textdomain' ),
		'name_admin_bar' => __( 'Project', 'textdomain' ),
		'archives' => __( 'Project Archives', 'textdomain' ),
		'attributes' => __( 'Project Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent project:', 'textdomain' ),
		'all_items' => __( 'All Projects', 'textdomain' ),
		'add_new_item' => __( 'Add New Project', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Project', 'textdomain' ),
		'edit_item' => __( 'Edit Project', 'textdomain' ),
		'update_item' => __( 'Update Project', 'textdomain' ),
		'view_item' => __( 'View Project', 'textdomain' ),
		'view_items' => __( 'View Projects', 'textdomain' ),
		'search_items' => __( 'Search Projects', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into project', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'textdomain' ),
		'items_list' => __( 'projects list', 'textdomain' ),
		'items_list_navigation' => __( 'projects list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter projects list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'project', 'textdomain' ),
		'description' => __( 'various ALT Lab projects', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'trackbacks', 'page-attributes', 'custom-fields', ),
        'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-hammer',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'create_project_cpt', 0 );


// Register Custom Post Type faculty
// Post Type Key: faculty
function create_faculty_cpt() {

	$labels = array(
		'name' => __( 'Faculty', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Faculty', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Faculty', 'textdomain' ),
		'name_admin_bar' => __( 'Faculty', 'textdomain' ),
		'archives' => __( 'Faculty Archives', 'textdomain' ),
		'attributes' => __( 'Faculty Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent faculty:', 'textdomain' ),
		'all_items' => __( 'All faculty', 'textdomain' ),
		'add_new_item' => __( 'Add New Faculty', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Faculty', 'textdomain' ),
		'edit_item' => __( 'Edit Faculty', 'textdomain' ),
		'update_item' => __( 'Update Faculty', 'textdomain' ),
		'view_item' => __( 'View Faculty', 'textdomain' ),
		'view_items' => __( 'View Faculty', 'textdomain' ),
		'search_items' => __( 'Search Faculty', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into faculty', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this faculty', 'textdomain' ),
		'items_list' => __( 'faculty list', 'textdomain' ),
		'items_list_navigation' => __( 'faculty list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter faculty list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'faculty', 'textdomain' ),
		'description' => __( 'the great people we work with', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-universal-access-alt',
	);
	register_post_type( 'faculty', $args );

}
add_action( 'init', 'create_faculty_cpt', 0 );

// Post Type Key: WORKSHOPS
function create_workshop_cpt() {

	$labels = array(
		'name' => __( 'Workshops', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Workshop', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Workshops', 'textdomain' ),
		'name_admin_bar' => __( 'Workshop', 'textdomain' ),
		'archives' => __( 'Workshop Archives', 'textdomain' ),
		'attributes' => __( 'Workshop Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Workshop:', 'textdomain' ),
		'all_items' => __( 'All Workshops', 'textdomain' ),
		'add_new_item' => __( 'Add New Workshop', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Workshop', 'textdomain' ),
		'edit_item' => __( 'Edit Workshop', 'textdomain' ),
		'update_item' => __( 'Update Workshop', 'textdomain' ),
		'view_item' => __( 'View Workshop', 'textdomain' ),
		'view_items' => __( 'View Workshops', 'textdomain' ),
		'search_items' => __( 'Search Workshops', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Workshop', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this workshop', 'textdomain' ),
		'items_list' => __( 'Workshop list', 'textdomain' ),
		'items_list_navigation' => __( 'workshops list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter workshops list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'workshop', 'textdomain' ),
		'description' => __( ' ALT Lab workshops', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => '',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'trackbacks', 'page-attributes', 'custom-fields', ),
        'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-nametag',
	);
	register_post_type( 'workshop', $args );

}
add_action( 'init', 'create_workshop_cpt', 0 );

//TAXONOMIES
//create emails taxonomies, genres and tags for the post type project and faculty

//EMAILS
add_action( 'init', 'create_tag_taxonomies', 0 );
function create_tag_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'emails', 'taxonomy general name' ),
    'singular_name' => _x( 'email', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search emails' ),
    'popular_items' => __( 'Popular emails' ),
    'all_items' => __( 'All emails' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit email' ),
    'update_item' => __( 'Update email' ),
    'add_new_item' => __( 'Add New email' ),
    'new_item_name' => __( 'New email Name' ),
    'separate_items_with_commas' => __( 'Separate emails with commas' ),
    'add_or_remove_items' => __( 'Add or remove emails' ),
    'choose_from_most_used' => __( 'Choose from the most used emails' ),
    'menu_name' => __( 'Emails' ),
  );

//registers taxonomy to both project, faculty, and workshop post types
  register_taxonomy('emails',array('project','faculty','workshop'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'email' ),
    'show_in_rest'          => true,
    'rest_base'             => 'emails',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  ));
}


//DEPT TAX
add_action( 'init', 'create_dept_taxonomies', 0 );
function create_dept_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'departments', 'taxonomy general name' ),
    'singular_name' => _x( 'department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search departments' ),
    'popular_items' => __( 'Popular departments' ),
    'all_items' => __( 'All departments' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit departments' ),
    'update_item' => __( 'Update department' ),
    'add_new_item' => __( 'Add New department' ),
    'new_item_name' => __( 'New department' ),
    'add_or_remove_items' => __( 'Add or remove departments' ),
    'choose_from_most_used' => __( 'Choose from the most used departments' ),
    'menu_name' => __( 'Department' ),
  );

//registers taxonomy to both project and faculty post types
  register_taxonomy('departments',array('project','faculty'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'department' ),
    'show_in_rest'          => true,
    'rest_base'             => 'department',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  ));
}


//TOOLS
add_action( 'init', 'create_tool_taxonomies', 0 );
function create_tool_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'tools', 'taxonomy general name' ),
    'singular_name' => _x( 'tools', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search tools' ),
    'popular_items' => __( 'Popular tools' ),
    'all_items' => __( 'All tools' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit tool' ),
    'update_item' => __( 'Update email' ),
    'add_new_item' => __( 'Add New tools' ),
    'new_item_name' => __( 'New tools Name' ),
    'separate_items_with_commas' => __( 'Separate tools with commas' ),
    'add_or_remove_items' => __( 'Add or remove tools' ),
    'choose_from_most_used' => __( 'Choose from the most used tools' ),
    'menu_name' => __( 'Tools' ),
  );

//registers taxonomy to both project and faculty post types
  register_taxonomy('tools',array('project', 'workshop'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tool' ),
    'show_in_rest'          => true,
    'rest_base'             => 'tools',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  ));
}

//PROJECT CONCEPTS
add_action( 'init', 'create_project_concept_taxonomies', 0 );
function create_project_concept_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'concepts', 'taxonomy general name' ),
    'singular_name' => _x( 'concept', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search concepts' ),
    'popular_items' => __( 'Popular concepts' ),
    'all_items' => __( 'All concepts' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit concept' ),
    'update_item' => __( 'Update concept' ),
    'add_new_item' => __( 'Add New concept' ),
    'new_item_name' => __( 'New concept' ),
    'add_or_remove_items' => __( 'Add or remove concept' ),
    'choose_from_most_used' => __( 'Choose from the most used concepts' ),
    'menu_name' => __( 'Concept' ),
  );

//registers taxonomy to both project and faculty post types
  register_taxonomy('concepts',array('project','workshop'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'concept' ),
    'show_in_rest'          => true,
    'rest_base'             => 'concept',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  ));
}



//PROJECT DATA


function dayCounter () {
	$start = strtotime(get_field('start_date'));
	$end = strtotime(get_field('end_date'));
	if($start && $end != null){
		$secs = $end - $start;// == <seconds between the two times>
		$days = $secs/86400;
	    return $days;
	} else {
		return 'TBD'; // if both dates aren't set indicate it's ongoing
	}

}

//SLACK INTEGRATION

function authIt(){
	session_start();
	 
	$provider = new \AdamPaterson\OAuth2\Client\Provider\Slack([
	    'clientId'          => '{4081269649.203646717715}',
	    'clientSecret'      => '{7caaa5477b889d711e2bc134bdfdc4ba}',
	    'redirectUri'       => 'https://example.com/callback-url',
	]);
	 
	if (!isset($_GET['code'])) {
 
    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: '.$authUrl);
    exit;
  
	// Check given state against previously stored one to mitigate CSRF attack
	} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
	 
	    unset($_SESSION['oauth2state']);
	    exit('Invalid state');
	 
	} else {
	    // Try to get an access token (using the authorization code grant)
	    $token = $provider->getAccessToken('authorization_code', [
	        'code' => $_GET['code']
	    ]);
	 
	    // Optional: Now you have a token you can look up a users profile data
	    try {
	 
	        // We got an access token, let's now get the user's details
	        $team = $provider->getResourceOwner($token);
	 
	        // Use these details to create a new profile
	        printf('Hello %s!', $team->getName());
	 
	    } catch (Exception $e) {
	 
	        // Failed to get user details
	        exit('Oh dear...');
	    }
	 
	    // Use this to interact with an API on the users behalf
	    echo $token->getToken();
	}
}

/////////////////

function slackCounter ($post_name){
	$name = 'p-'.$post_name;
	$clean = preg_replace('/[^a-z0-9]+/i','-',$name);
	$cleaner = strtolower($clean);
	$channel = substr($cleaner,0,21);//slack only allows 21 character names
	$slack = @file_get_contents('https://slack.com/api/search.messages?token=xoxp-4081269649-4081269659-204993259252-ebdd9a69c4dde95b8857eb8807078b54&query=in%3A'. $channel .'&pretty=1');
	if ($slack){
		$obj = json_decode($slack);
		if ($obj->messages->total > 0){
			return $obj->messages->total;
		} else {
			return 'N/A';
		}
	}
}

function slackChannelMaker($id, $post){
	$token = 'xoxp-4081269649-4081269659-204993259252-ebdd9a69c4dde95b8857eb8807078b54';
	$id = $post->ID;
	$name = substr($post->post_name,0,21);
	$channelName = 'p-'.$name;
	$slackAPI = 'https://slack.com/api/channels.create?token='.$token.'&name=%23'.$channelName.'&pretty=1';
	if (getStatus($id) != 'published'){
		@file_get_contents($slackAPI);
		$channelId = getSlackChannelId($channelName);
		$invite = slackInviteUsers($channelId);
	}

}

function getSlackChannelId ($channelName){
		$token = 'xoxp-4081269649-4081269659-204993259252-ebdd9a69c4dde95b8857eb8807078b54';
		$channel_url = 'https://slack.com/api/channels.list?token='.$token.'&exclude_archived=true&pretty=1';
		$channels = @file_get_contents($channel_url);
		if($channels){
			$data = json_decode($channels);
			$num_chan = sizeof($data->channels);
			for($i=1; $i < $num_chan; $i++){
				if ($data->channels[$i]->name == $channelName){
					$id = $data->channels[$i]->id;
					return $id;
				}
		} return 'foo';
	}
}

function slackInviteUsers($channelId){
	$token = 'xoxp-4081269649-4081269659-204993259252-ebdd9a69c4dde95b8857eb8807078b54';
	$jeff = 'U5S73F6PM';
	$matt = 'U5CB7N51P';
	$tom = 'U042D7XKD';
	$users = [$jeff,$matt,$tom];
	for ($x = 0; $x < sizeof($users); $x++) {
		$fullURL = 'https://slack.com/api/channels.invite?token='.$token.'&channel='.$channelId.'&user='.$users[$x].'&pretty=1';
	    @file_get_contents($fullURL);
	}
}

function slackUrl($post_name){
	$name = 'p-'.$post_name;
	$clean = preg_replace('/[^a-z0-9]+/i','-',$name);
	$lower = strtolower($clean);
	$channel = substr($lower,0,21);
	$id = getSlackChannelId($channel);
	if($id){
		$url = 'https://altlab.slack.com/messages/'.$id;
		echo '<a href="'.$url.'">';
	}
}

function slackArchive($id, $post){
	$id = $post->ID;
	if (projectClosed($id)){
		$channelName = 'p-'.$post->post_name;
		$channelId = getSlackChannelId($channelName);
		$token = 'xoxp-4081269649-4081269659-204993259252-ebdd9a69c4dde95b8857eb8807078b54';
		$url = 'https://slack.com/api/channels.archive?token='.$token.'&channel='.$channelId.'&pretty=1';
		@file_get_contents($url);
	}
}

//Google Form Filler-Outter

function submitGoogleForm ($id, $post){
	$id = $post->ID;
	$formUrl = 'https://docs.google.com/a/vcu.edu/forms/d/e/1FAIpQLScK2wgma6Oicv_ZY9i-6tg_w9RfEKKkgiAFJDw15jJnmr5ofQ/formResponse?usp=pp_url&entry.1431785794=';
	$projectName =$post->post_name;
	$submit = '&submit=Submit';
	$fullUrl = $formUrl.$projectName.$submit;
	if (getStatus($id) != 'published'){
		file_get_contents($fullUrl);
	}
}

//makes a custom field called status and sets it to published, prevents repeate Google Drive creations but allows regeneration on post update if you unset/delete it
function setProjectStatus ($id){
	update_post_meta( $id, 'status', 'published');
}

function getStatus ($id) {
	$status = get_post_custom_values( 'status' )[0];
	return $status;
}

function projectClosed($id){
	$end_date = get_field('end_date', $id);
	return $end_date;
}

add_action( 'publish_project', 'slackChannelMaker', 10, 2);
add_action( 'publish_project', 'submitGoogleForm', 10, 2);
add_action( 'publish_project', 'setProjectStatus', 10, 2);
add_action( 'publish_project', 'slackArchive', 10, 2);

//faculty details

function getFacultyDept ($id){
	if (wp_get_post_terms($id, 'departments')){
	  $dept = wp_get_post_terms($id, 'departments');
      echo $dept[0]->name;
  }
}

function getFacultyTitle ($id){
	if (get_field('title', $id)){
	  $title = get_field('title', $id);
      echo $title;
  }
}
