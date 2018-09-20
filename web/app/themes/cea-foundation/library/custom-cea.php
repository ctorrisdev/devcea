<?php

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Commissaires', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Commissaire', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Commissaires'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Tous les commissaires'),
		'view_item'           => __( 'Voir les commissaires'),
		'add_new_item'        => __( 'Ajouter un nouveau commissaire'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le commissaire'),
		'update_item'         => __( 'Modifier le commissaire'),
		'search_items'        => __( 'Rechercher un commissaire'),
		'not_found'           => __( 'Non trouvé'),
		'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Commissaires'),
		'description'         => __( 'Tous sur commissaires'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-admin-users',
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'commissaires'),


	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'commissaires', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );




if ( ! function_exists( 'get_posts_marquee' ) ) {
	function get_posts_marquee() {
; 
	$recent_posts = wp_get_recent_posts( );
	foreach( $recent_posts as $recent ){
// print_r($recent);
    	$marquee = '<span class="marquee-space">&nbsp;&nbsp;&mdash;&nbsp;&nbsp;</span>';
			$marquee .='<span>';
      $marquee .='<a title="'.$recent["post_title"].'" class="by-place" href="' . get_permalink($recent["ID"]) . '" data-id="'.$recent["ID"].'">'.$recent["post_title"].'</a></span>';
    
    echo $marquee;
	}
    
	//wp_reset_query();

  }
}



add_role('curator', __(
    'Commissaire'),
    array(
        'read'              => true,
        'create_posts'      => true, 
        'edit_posts'        => true, 
        'edit_others_posts' => false,
        'publish_posts'     => true,
        'manage_categories' => false
        )
);

?>