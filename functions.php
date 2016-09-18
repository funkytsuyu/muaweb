<?php
add_action('after_setup_theme', 'oascore_setup');
function oascore_setup()
{
load_theme_textdomain('oascore', get_template_directory() . '/languages');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(array(
'main-menu-left' => __( 'Main Menu Left', 'oascore' ),
'main-menu-right' => __( 'Main Menu Right', 'oascore' ),
'mobile-menu' => __( 'Mobile Menu', 'oascore' )
));
}
add_action('wp_enqueue_scripts', 'oascore_load_scripts');
function oascore_load_scripts()
{
	wp_register_script( 'script', get_template_directory_uri() . '/js/script.js', 'jquery', null, true );
	wp_register_script( 'functoggle', get_template_directory_uri() . '/js/jquery.func_toggle.js', 'jquery', null, true );
	wp_register_script( 'imagesLoaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', 'jquery', null, true );
	wp_register_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', 'jquery', null, true );
	wp_register_script( 'slick', get_template_directory_uri() . '/js/slick.js', 'jquery', null, true );
	wp_enqueue_script('jquery');
	wp_enqueue_script('imagesLoaded');
	wp_enqueue_script('masonry');
	wp_enqueue_script('functoggle');
	wp_enqueue_script('slick');
	wp_enqueue_script('script');

}
add_action('comment_form_before', 'oascore_enqueue_comment_reply_script');
function oascore_enqueue_comment_reply_script()
{
if (get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'oascore_title');
function oascore_title($title) {
if ($title == '') {
return '&rarr;';
} else {
return $title;
}
}
add_filter('wp_title', 'oascore_filter_wp_title');
function oascore_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_action('widgets_init', 'oascore_widgets_init');
function oascore_widgets_init()
{
register_sidebar( array (
'name' => __('Sidebar Widget Area', 'oascore'),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function oascore_custom_pings($comment)
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter('get_comments_number', 'oascore_comments_number');
function oascore_comments_number($count)
{
if (!is_admin()) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count($comments_by_type['comment']);
} else {
return $count;
}
}

if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Secondary Image',
                'id' => 'secondary-image',
                'post_type' => 'post'
            )
        );
    }

// projets meta box

// Adds a meta box to the post editing screen

function OAS_meta_projet() {
    add_meta_box( 'infos_projet', 'Additional info on the project', 'OAS_meta_projet_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'OAS_meta_projet' );

// Outputs the content of the meta box

function OAS_meta_projet_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'OAS_nonce' );
    $OAS_stored_meta_projet = get_post_meta( $post->ID );
    ?>
 <div class="wrapcustomfield">
    <p>
		<label for="meta-projet-desc" ><?php _e( 'Description du projet', 'OAS-textdomain' )?></label>
		<textarea name="meta-projet-desc" id="meta-projet-desc" ><?php if ( isset ( $OAS_stored_meta_projet['meta-projet-desc'] ) ) echo $OAS_stored_meta_projet['meta-projet-desc'][0]; ?></textarea>
		<small>Enter the description of the projet, this will appear above the credits</small>
        <label for="meta-projet-credits" ><?php _e( 'Credits', 'OAS-textdomain' )?></label>
		<textarea name="meta-projet-credits" id="meta-projet-credits" ><?php if ( isset ( $OAS_stored_meta_projet['meta-projet-credits'] ) ) echo htmlspecialchars($OAS_stored_meta_projet['meta-projet-credits'][0]); ?></textarea>
		<small>Enter the list of contributors as a pair of values separated by ":" Task first, name second, pairs of values are separated from eah other by commas ","</small>
    </p>
</div>
    <?php
}

// Saves the custom meta input

function OAS_meta_save_projet( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'OAS_nonce' ] ) && wp_verify_nonce( $_POST[ 'OAS_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'meta-projet-credits' ] ) ) {
        update_post_meta( $post_id, 'meta-projet-credits',  $_POST[ 'meta-projet-credits' ] ) ;
    }

	 // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'meta-projet-desc' ] ) ) {
        update_post_meta( $post_id, 'meta-projet-desc',  $_POST[ 'meta-projet-desc' ] );
    }
}
add_action( 'save_post', 'OAS_meta_save_projet' );

// end projets meta box


// Theme admin page

$themename = "Audrey Lavigne";
$shortname = "AL";

$options = array (
array( "name" => $themename." Options",	"type" => "title"),
array( "name" => "social",	"type" => "section"),
array( "type" => "open"),
array( "name" => "facebook page link",
	"desc" => "",
	"id" => $shortname."_facebook",
	"type" => "text",
	"std" => ""),
array( "name" => "instagram link",
	"desc" => "",
	"id" => $shortname."_instagram",
	"type" => "text",
	"std" => ""),
array( "name" => "linked in link",
	"desc" => "",
	"id" => $shortname."_linkedin",
	"type" => "text",
	"std" => ""),
array( "type" => "close"),
array( "name" => "contact page content",	"type" => "section"),
array( "type" => "open"),
array( "name" => "text contact page",
	"desc" => "",
	"id" => $shortname."_text_contact",
	"type" => "textarea",
	"std" => ""),
array( "type" => "close"),
array( "name" => "category images",	"type" => "section"),
array( "type" => "open"),
array( "name" => "beauty cover image",
	"desc" => "",
	"id" => $shortname."_beauty_img",
	"type" => "text",
	"std" => ""),
array( "name" => "creative cover image",
	"desc" => "",
	"id" => $shortname."_creative_img",
	"type" => "text",
	"std" => ""),
array( "name" => "fashion cover image",
	"desc" => "",
	"id" => $shortname."_fashion_img",
	"type" => "text",
	"std" => ""),
array( "name" => "wedding cover image",
	"desc" => "",
	"id" => $shortname."_wedding_img",
	"type" => "text",
	"std" => ""),
array( "name" => "seances thematiques cover image",
	"desc" => "",
	"id" => $shortname."_seances_img",
	"type" => "text",
	"std" => ""),
array( "type" => "close")
);

function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=functions.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=functions.php&reset=true");
die;
}
}
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
add_menu_page('guide de contenu', 'guide contenu', 'administrator', 'guide-de-contenu', 'mytheme_content_guide');
}
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
}


function mytheme_admin() {
global $themename, $shortname, $options;
$i=0;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> options</h2>
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?>
<?php break;
case "close":
?>
</div>
</div>
<br />
<?php break;
case "title":
?>
<p>Pour modifier le thème du site d'<?php echo $themename;?> utiliser le menu ci-dessous</p>
<?php break;
case 'text':
?>
<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<div class="rm_form_input">
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
		<small><?php echo $value['desc']; ?></small>
	</div>
	<div class="clearfix"></div>
 </div>
<?php
break;
case 'textarea':
?>
<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<div class="rm_form_input">
 		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 		<small><?php echo $value['desc']; ?></small>
	</div>
	<div class="clearfix"></div>
 </div>
<?php
break;
case 'select':
?>
<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<div class="rm_form_input">
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach ($value['options'] as $option) { ?>
			<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
		</select>
		<small><?php echo $value['desc']; ?></small>
	</div>
	<div class="clearfix"></div>
</div>
<?php
break;
case "checkbox":
?>
<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<div class="rm_form_input">
		<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		<small><?php echo $value['desc']; ?></small>
	</div>
	<div class="clearfix"></div>
 </div>
<?php break;
case "section":
$i++;
?>
<div class="rm_section">
<div class="rm_title"><h3><?php echo $value['name']; ?></h3><div class="clearfix"></div></div>
<div class="rm_options">
<?php break;
}
}
?>
<span class="submit rm_submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" /></span>
<input type="hidden" name="action" value="save" />
</form>
</div>
<?php
}
?>
	<?php function mytheme_content_guide() { ?>
	<div class="wrap rm_wrap">
		<h2><?php echo 'Guide de contenu du site ' . get_bloginfo('name') ?></h2>
		<p>
			Cette page sert de guide d'entrée de contenu pour les diverses sections du présent site. Le guide est séparé par type de contenu, pour les éléments de contenu n'étant pas présentés dans ce guide, veuillez vous référrer a la page d'options du thème, juste au-dessus de celle-ci dans le menu latéral.
		</p>
		<div class="rm_section">
			<h3>
				Pages (beauty, creative, fashion, wedding)
			</h3>
			<p>
				Les pages contiennent du contenu statique (description des services, tarifs, etc.) ainsi que du contenu dynamique (projets en lien avec la catégorie). Pour modifier le contenu statique de chaque page, suivre les étapes suivantes:
			</p>
			<ul class="number-list">
				<li><strong>1</strong> cliquer sur l'onglet pages dans le menu latéral</li>
				<li><strong>2</strong> chosir la page que l'on désire modifier</li>
				<li><strong>3</strong> Dans le champ de contenu principal on a accès au contenu statique, délimité par des divs spécifiques pour chaque section</li>
				<li><strong>4</strong> le blockquote qui se présente en premier contient une courte phrase accrocheuse qui présente rapidement le service</li>
				<li><strong>5</strong> le texte sous le titre <strong>the process</strong> décrit le processus et les détails du service </li>
				<li><strong>6</strong> suite a ces section, il y a les tarifs des packages. Chaque package est inclus dans un div ayant la classe package </li>
				<li><strong>7</strong> dans ce package, il y a premièrement un autre div ayant la classe title, celui-ci contient un div ayant la classe price dans lequel est indiqué le prix principal du service suivi du titre du package </li>
				<li><strong>8</strong> en-dessous du div title, dans le div package se retrouve la description du package et les prix alternatifs </li>
			</ul>
		</div>
		<div class="rm_section">
			<h3>
				Projets
			</h3>
			<p>
				Les projets contienent des images additionelles pour chaque projet ainsi qu'une courte description et des crédits. Pour modifier ou ajouter un projet, veuillez suivre les étapes ci-dessous:
			</p>
			<ul class="number-list">
				<li><strong>1</strong> cliquer sur l'onglet posts dans le menu latéral</li>
				<li><strong>2</strong> chosir le projet que l'on désire modifier ou cliquer sur le bouton add new dans le haut de la page</li>
				<li><strong>3</strong> Dans la boite additional infos, on retrouve deux champs. Le premier contient la description du projet</li>
				<li><strong>4</strong> le deuxième champ accepte une liste de noms de et tâches, les deux éléments de spaires sont séparés par des ":" sans espace avant ou après, les paires sont séparées par des virgules, sans espaces encore une fois.</li>
				<li><strong>5</strong> La boite featured image a droite contient l'image de bannière, faite en largeur, de dimensions: 1500px x 600px</li>
				<li><strong>6</strong> La boite secondary image contient l'image d'aperçu format portrait qui apparait dans le spages de sections. Ses dimensions sont de 440px x 650px </li>
				<li><strong>7</strong> Le champ de contenu principal contient les images pleine grosseur du projet, celles ci peuvent être disposées en colonnes dans la page en les mettant dans des divs ayant la classe <strong>half-left</strong> ou <strong>half-right</strong> ou bien <strong>full</strong> pour le simages en format paysage. Il est important de commencer la séquence d'images par une image dans un div ayant la classe half-left.</li>
			</ul>
		</div>
		<div class="rm_section">
			<h3>
				boutons modifier
			</h3>
			<p>
				Des boutons "modifier" sont visibles sur les différentes sections du site lorsque vous êtes connectés avec votre utilisateur. Ces boutons permettent d'accéder rapidement a la page de modification du projet ou de la page affichée.
			</p>
		</div>
	</div>
<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
