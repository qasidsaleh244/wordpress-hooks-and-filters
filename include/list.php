<!--**************************************************
                    ADMIN MENU
***************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading1">
            <h2 class="m-0">
                <button class="" type="button" data-toggle="collapse" data-target="#collapse01" aria-expanded="true" aria-controls="collapse01">01: Create New Admin Menu</button>
            </h2>
        </div>
        <div id="collapse01" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_action( 'admin_menu', 'extra_post_info_menu' );
                        function extra_post_info_menu(){
                            $page_title = 'WordPress Extra Post Info';
                            $menu_title = 'Extra Post Info';
                            $capability = 'manage_options';
                            $menu_slug  = 'extra-post-info';
                            $function   = 'extra_post_info_page';
                            $icon_url   = 'dashicons-media-code';
                            $position   = 2;
                            add_menu_page(
                                $page_title,
                                $menu_title,
                                $capability,
                                $menu_slug,
                                $function,
                                $icon_url,
                                $position
                            );
                        };
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--**************************************************
            ADMIN MENU WITH CUSTOM LINK
***************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading2">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse02" aria-expanded="false" aria-controls="collapse02">02: Change wordpress login screen logo</button>
            </h2>
        </div>
        <div id="collapse02" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_action( 'admin_menu', 'linked_url' );
                        function linked_url() {
                            add_menu_page( 'linked_url', 'External link', 'read', 'my_slug', '', 'dashicons-text', 1 );
                        }
                        add_action( 'admin_menu' , 'linkedurl_function' );
                        function linkedurl_function() {
                            global $menu;
                            $menu[1][2] = "http://www.example.com";
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
            REDIRECTION TO PAGE
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading3">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse03" aria-expanded="false" aria-controls="collapse03">03: Redirection to page</button>
            </h2>
        </div>
        <div id="collapse03" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function my_logged_in_redirect() {
                            if ( is_page( 504 ) ){
                                wp_redirect( get_permalink( 7 ) );
                                die;
                            }
                        }
                        add_action( 'template_redirect', 'my_logged_in_redirect' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
            INCLUDE CHILD STYLESHEET
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading4">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse04" aria-expanded="false" aria-controls="collapse04">04: Include Child Stylesheet</button>
            </h2>
        </div>
        <div id="collapse04" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
                        function my_theme_enqueue_styles() {
                            $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
                            wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
                            wp_enqueue_style( 'child-style',
                                get_stylesheet_directory_uri() . '/style.css',
                                array( $parent_style ),
                                wp_get_theme()->get('Version')
                            );
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
                REMOVE ADMIN MENU
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading5">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse05" aria-expanded="false" aria-controls="collapse05">05: Remove Admin Menu</button>
            </h2>
        </div>
        <div id="collapse05" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function remove_menus(){
                            remove_menu_page( 'index.php' );               //Dashboard
                            remove_menu_page( 'edit.php' );                //Posts
                            remove_menu_page( 'upload.php' );              //Media
                            remove_menu_page( 'edit-comments.php' );       //Comments
                            remove_menu_page( 'plugins.php' );             //Plugins
                            remove_menu_page( 'users.php' );               //Users
                            remove_menu_page( 'tools.php' );               //Tools
                            remove_menu_page( 'options-general.php' );     //Settings
                        }
                        add_action( 'admin_menu', 'remove_menus' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--**************************************************
            REGISTER HEADER AND FOOTER
***************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading6">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse06" aria-expanded="false" aria-controls="collapse06">06: Register Header & Footer</button>
            </h2>
        </div>
        <div id="collapse06" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        register_nav_menus( array(
                            'header'  => __( 'Header', 'project_name' ),
                        ) );
                        add_theme_support( 'menus' );
                        add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
                        function wpse156165_menu_add_class( $atts, $item, $args ) {
                            $class = 'nav-link';
                            $atts['class'] = $class;
                            return $atts;
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!-- *************************************************
            ACF THEME SETTINGS PAGE
***************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading7">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse07" aria-expanded="false" aria-controls="collapse07">07: ACF Theme Settings Option</button>
            </h2>
        </div>
        <div id="collapse07" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        if (function_exists('acf_add_options_page')) {
                            acf_add_options_page(array(
                                'page_title' => 'Theme General Settings',
                                'menu_title' => 'Theme Settings',
                                'menu_slug' => 'theme-general-settings',
                                'capability' => 'edit_posts',
                                'redirect' => false
                            ));
                            acf_add_options_sub_page(array(
                                'page_title'    => 'Theme Header Settings',
                                'menu_title'    => 'Header',
                                'parent_slug'   => 'theme-general-settings',
                            ));
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
        SPAN OPTION ENABLED IN EDITOR
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading8">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse08" aria-expanded="false" aria-controls="collapse08">08: Span Tag Enabled in WP Editor</button>
            </h2>
        </div>
        <div id="collapse08" class="collapse" aria-labelledby="heading8" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function override_mce_options($initArray){
                            $opts = '*[*]';
                            $initArray['valid_elements'] = $opts;
                            $initArray['extended_valid_elements'] = $opts;
                            return $initArray;
                        }
                        add_filter('tiny_mce_before_init', 'override_mce_options');
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
            FEATURED IMAGE Dimension
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading9">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse09" aria-expanded="false" aria-controls="collapse09">09: Featured Image Dimension</button>
            </h2>
        </div>
        <div id="collapse09" class="collapse" aria-labelledby="heading9" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function custom_admin_post_thumbnail_html( $content ) {
                            return $content = str_replace( __( 'Set featured image' ), __( 'Upload image (1920 x 324)' ), $content);
                        }
                        add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );
                        function custom_admin_post_thumbnail_html1( $content1 ) {
                            return $content1 = str_replace( __( 'Click the image to edit or update' ), __( 'image (1920 x 324)' ), $content1);
                        }
                        add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html1' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
            ADD CLASS IN MENU ANCHOR LINK
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading10">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">10: Add Class in Menu Anchor Link</button>
            </h2>
        </div>
        <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
                        function wpse156165_menu_add_class( $atts, $item, $args ) {
                            $class = 'nav-link';
                            $atts['class'] = $class;
                            return $atts;
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
            ADD CLASS IN DROPDOWN MENU
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading11">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapse11">11: Add Class in Dropdown Menu</button>
            </h2>
        </div>
        <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_filter( 'nav_menu_link_attributes', 'add_class_to_items_link', 10, 3 );
                        function add_class_to_items_link( $atts, $item, $args ) {
                            // check if the item has children
                            $hasChildren = (in_array('menu-item-has-children', $item->classes));
                            if ($hasChildren) {
                                // add the desired attributes:
                                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
                                $atts['class'] = 'nav-link dropdown-toggle';
                                $atts['data-hover'] = 'dropdown';
                            }
                            return $atts;
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
    ADD CLASS WHEN NEW IMAGE UPLOAD THORUGH EDITOR
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading12">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="false" aria-controls="collapse12">12: Add Class When New Image Upload Through WP Editor</button>
            </h2>
        </div>
        <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function nddt_add_class_to_images($class){
                            $class .= ' img-fluid';
                            return $class;
                        }
                        add_filter('get_image_tag_class','nddt_add_class_to_images');
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
                CUSTOM POST TYPE
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading13">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">13: Add Custom Post Type</button>
            </h2>
        </div>
        <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function PRODUCTS() {
                            register_post_type( 'Products',
                            array(
                                'labels' => array(
                                    'name' => __( 'Products'),
                                    'singular_name' => __( 'Products')
                                ),
                                'public' => true,
                                    'menu_icon' => 'dashicons-products',
                                    'has_archive' => ture,
                                    'rewrite' => array('slug' => 'products'),
                                )
                            );
                        }
                        add_action( 'init', 'PRODUCTS' );
                        function PRODUCTS_a() {
                            $labels = array(
                                'name'                => _x( 'Products', 'Post Type General Name', 'project_name' ),
                                'singular_name'       => _x( 'Products', 'Post Type Singular Name', 'project_name' ),
                                'menu_name'           => __( 'Products', 'project_name' ),
                                'parent_item_colon'   => __( 'Products', 'project_name' ),
                                'all_items'           => __( 'All Products', 'project_name' ),
                                'view_item'           => __( 'View Products', 'project_name' ),
                                'add_new_item'        => __( 'Add New Products', 'project_name' ),
                                'add_new'             => __( 'Add New', 'project_name' ),
                                'edit_item'           => __( 'Edit Products', 'project_name' ),
                                'update_item'         => __( 'Update Products', 'project_name' ),
                                'search_items'        => __( 'Search Products', 'project_name' ),
                                'not_found'           => __( 'Not Found', 'project_name' ),
                                'not_found_in_trash'  => __( 'Not found in Trash', 'project_name' ),
                            );
                            $args = array(
                                'label'               => __( 'Products', 'project_name' ),
                                'description'         => __( 'Products', 'project_name' ),
                                'labels'              => $labels,
                                'supports'            => array( 'title', 'editor', 'thumbnail'),
                                'taxonomies'          => array( 'genres' ),
                                'hierarchical'        => true,
                                'public'              => true,
                                'show_ui'             => true,
                                'show_in_menu'        => true,
                                'show_in_nav_menus'   => true,
                                'show_in_admin_bar'   => true,
                                'menu_position'       => 1,
                                'can_export'          => true,
                                'has_archive'         => true,
                                'exclude_from_search' => false,
                                'publicly_queryable'  => true,
                                'capability_type'     => 'page',
                                'taxonomies'          => array( 'category' )
                            );
                            register_post_type( 'PRODUCTS', $args );
                        }
                        add_action( 'init', 'PRODUCTS_a', 0 );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
      PARENT AND CHILD PAGES CLASS IN BODY TAG
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading14">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="false" aria-controls="collapse14">14: Parent and Child Pages Slug in Body Class</button>
            </h2>
        </div>
        <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_filter('body_class','body_class_section');
                        function body_class_section($classes) {
                            global $wpdb, $post;
                            if (is_page()) {
                                if ($post->post_parent) {
                                    $parent = end(get_post_ancestors($current_page_id));
                                } else {
                                    $parent = $post->ID;
                                }
                                $post_data = get_post($parent, ARRAY_A);
                                $classes[] = 'parent-' . $post_data['post_name'];
                            }
                            return $classes;
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
                   REGISTER WIDGET
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading15">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="false" aria-controls="collapse15">15: Register Widget</button>
            </h2>
        </div>
        <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_action( 'widgets_init', 'theme_slug_widgets_init' );
                        function theme_slug_widgets_init() {
                            register_sidebar( array(
                                'name' => __( 'widget name', 'theme-slug' ),
                                'id' => 'widget_id',
                                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                                'after_widget'  => '</section>',
                                'before_title'  => '<span class="widgettitle">',
                                'after_title'   => '</span>',
                            ) );
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
                CUSTOM TAXONOMY
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading16">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse16" aria-expanded="false" aria-controls="collapse16">16: Custom Taxonomy</button>
            </h2>
        </div>
        <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function be_register_taxonomies() {
                            $taxonomies = array(
                                array(
                                    'slug'         => 'taxonomy_slug',
                                    'single_name'  => 'taxonomy name',
                                    'plural_name'  => 'taxonomy name',
                                    'post_type'    => 'cpt name',
                                    'rewrite'      => array( 'slug' => 'taxonomy slug' ),
                                ),
                            );
                            foreach( $taxonomies as $taxonomy ) {
                                $labels = array(
                                    'name' => $taxonomy['plural_name'],
                                    'singular_name' => $taxonomy['single_name'],
                                    'search_items' =>  'Search ' . $taxonomy['plural_name'],
                                    'all_items' => 'All ' . $taxonomy['plural_name'],
                                    'parent_item' => 'Parent ' . $taxonomy['single_name'],
                                    'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
                                    'edit_item' => 'Edit ' . $taxonomy['single_name'],
                                    'update_item' => 'Update ' . $taxonomy['single_name'],
                                    'add_new_item' => 'Add New ' . $taxonomy['single_name'],
                                    'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
                                    'menu_name' => $taxonomy['plural_name']
                                );
                                $rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
                                $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
                                register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
                                    'hierarchical' => $hierarchical,
                                    'labels' => $labels,
                                    'show_ui' => true,
                                    'query_var' => true,
                                    'rewrite' => $rewrite,
                                ));
                            }
                        }
                        add_action( 'init', 'be_register_taxonomies' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
            UNREGISTER POST TYPE
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading17">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse17" aria-expanded="false" aria-controls="collapse17">17: Unregister or Remove Post Type</button>
            </h2>
        </div>
        <div id="collapse17" class="collapse" aria-labelledby="heading17" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function delete_post_type(){
                            unregister_post_type( 'cpt 1 name' );
                            unregister_post_type( 'cpt 2 name' );
                            unregister_post_type( 'cpt 3 name' );
                        }
                        add_action('init','delete_post_type', 100);
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
              INCLUDE GOOGLE FONTS
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading18">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse18" aria-expanded="false" aria-controls="collapse18">18: Include Google Fonts</button>
            </h2>
        </div>
        <div id="collapse18" class="collapse" aria-labelledby="heading18" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function wpb_add_google_fonts() {
                            wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900', false );
                        }
                        add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
                HIDE UPDATE OPTION
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading19">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse19" aria-expanded="false" aria-controls="collapse19">19: Hide Update Button</button>
            </h2>
        </div>
        <div id="collapse19" class="collapse" aria-labelledby="heading19" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function remove_core_updates(){
                            global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
                        }
                        add_filter('pre_site_transient_update_plugins','remove_core_updates');
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
                FEATURED IMAGE
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading20">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse20" aria-expanded="false" aria-controls="collapse20">20: Featured Image</button>
            </h2>
        </div>
        <div id="collapse20" class="collapse" aria-labelledby="heading20" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_theme_support('post-thumbnails');
                        add_post_type_support( 'featured_image', 'thumbnail' );
                        function create_post_type() {
                            register_post_type( 'featured_image',
                                array(
                                    'labels' => array(
                                        'name' => __( 'Featured Image' ),
                                        'singular_name' => __( 'featured image' )
                                    ),
                                    'public' => true,
                                    'has_archive' => true
                                )
                            );
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
            SHOWING EMPTY CATEGORIES
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading21">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse21" aria-expanded="false" aria-controls="collapse21">21: Showing Empty Categories</button>
            </h2>
        </div>
        <div id="collapse21" class="collapse" aria-labelledby="heading21" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function display_empty_categories($cate) {
                            $cate['hide_empty'] = 0;
                            return $cate;
                        }
                        add_filter( 'widget_categories_args', 'display_empty_categories' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
        REMOVE ADMIN PREVIEW BUTTON
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading22">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse22" aria-expanded="false" aria-controls="collapse22">22: Remove Admin Preview Button</button>
            </h2>
        </div>
        <div id="collapse22" class="collapse" aria-labelledby="heading22" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function posttype_admin_css() {
                          global $post_type;
                          $post_types = array(
                            /* set post types */
                            'post_type_name',
                          );
                          if(in_array($post_type, $post_types))
                          echo '<style type="text/css">.editor-post-preview,#post-preview{display: none !important;}</style>';
                        }
                        add_action( 'admin_head-post-new.php', 'posttype_admin_css' );
                        add_action( 'admin_head-post.php', 'posttype_admin_css' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
    LIMIT WORDPRESS SEARCH TO SPECIFIC POST TYPE
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading23">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse23" aria-expanded="false" aria-controls="collapse23">23: limit Wordpress Search to Search Only Specific Post</button>
            </h2>
        </div>
        <div id="collapse23" class="collapse" aria-labelledby="heading23" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function searchfilter($query) {
                            if ($query->is_search && !is_admin() ) {
                                $query->set('post_type',array('product'));
                            }
                            return $query;
                        }
                        add_filter('pre_get_posts','searchfilter');
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
           ADD OR REMOVE USER ROLES
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading24">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse24" aria-expanded="false" aria-controls="collapse24">24: Add and Remove User Roles</button>
            </h2>
        </div>
        <div id="collapse24" class="collapse" aria-labelledby="heading24" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        remove_role( 'subscriber' );
                        remove_role( 'contributor' );
                        remove_role( 'author' );
                        add_role(
                            'dealer', __('Dealer'),
                            array()
                        );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--*************************************************
   REMOVE ADMIN VIEW ACTION FOR SPECIFIC POST TYPE
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading25">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse25" aria-expanded="false" aria-controls="collapse25">25: REMOVE ADMIN VIEW ACTION FOR SPECIFIC POST TYPE</button>
            </h2>
        </div>
        <div id="collapse25" class="collapse" aria-labelledby="heading25" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        add_filter( 'post_row_actions', 'remove_row_actions', 10, 1 );
                        function remove_row_actions( $actions ){
                            if( get_post_type() === 'post type name' )
                                unset( $actions['view'] );
                            return $actions;
                        }
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!-- **************************************************
          SEARCH RESULT PAGE PAGINATION
************************************************** -->
    <div class="card">
        <div class="card-header p-0" id="heading26">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse26" aria-expanded="false" aria-controls="collapse26">26: Search Results Page Pagination</button>
            </h2>
        </div>
        <div id="collapse26" class="collapse" aria-labelledby="heading26" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function my_post_queries( $query ) {
                            if (!is_admin() && $query->is_main_query()){
                                if(is_search()){
                                    $query->set('posts_per_page', 40);
                                }
                            }
                        }
                        add_action( 'pre_get_posts', 'my_post_queries' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--************************************************
          REMOVE DEFAULT P TAG FROM EXCERPT
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading27">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse27" aria-expanded="false" aria-controls="collapse27">27: Remove Default P Tag From Excerpt</button>
            </h2>
        </div>
        <div id="collapse27" class="collapse" aria-labelledby="heading27" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        remove_filter( 'the_excerpt', 'wpautop' );
                    </code>
                </pre>
            </div>
        </div>
    </div>
<!--************************************************
            REMOVE WP SCREEN OPTIONS
**************************************************-->
    <div class="card">
        <div class="card-header p-0" id="heading28">
            <h2 class="m-0">
                <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse28" aria-expanded="false" aria-controls="collapse28">28: Remove WP Screen Options</button>
            </h2>
        </div>
        <div id="collapse28" class="collapse" aria-labelledby="heading28" data-parent="#accordionExample">
            <div class="card-body">
                <pre>
                    <code>
                        function wpb_remove_screen_options() {
                        //if(!current_user_can('manage_options')) {
                            return false;
                        //}
                            //return true;
                        }
                        add_filter('screen_options_show_screen', 'wpb_remove_screen_options');
                    </code>
                </pre>
            </div>
        </div>
    </div>
