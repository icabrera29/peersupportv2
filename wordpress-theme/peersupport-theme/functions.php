<?php
/**
 * Peer Support Argentina Theme Functions
 *
 * @package PeerSupport
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function peersupport_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 600, true);

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'peersupport'),
        'footer'  => __('Footer Menu', 'peersupport'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'peersupport_setup');

/**
 * Enqueue scripts and styles
 */
function peersupport_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('peersupport-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue Google Fonts
    wp_enqueue_style('peersupport-fonts', 'https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap', array(), null);

    // Enqueue main JavaScript
    wp_enqueue_script('peersupport-main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'peersupport_scripts');

/**
 * Register Custom Post Type: Cursos
 */
function peersupport_register_cursos_post_type() {
    $labels = array(
        'name'                  => _x('Cursos', 'Post Type General Name', 'peersupport'),
        'singular_name'         => _x('Curso', 'Post Type Singular Name', 'peersupport'),
        'menu_name'             => __('Cursos', 'peersupport'),
        'name_admin_bar'        => __('Curso', 'peersupport'),
        'archives'              => __('Archivo de Cursos', 'peersupport'),
        'attributes'            => __('Atributos del Curso', 'peersupport'),
        'parent_item_colon'     => __('Curso Padre:', 'peersupport'),
        'all_items'             => __('Todos los Cursos', 'peersupport'),
        'add_new_item'          => __('Agregar Nuevo Curso', 'peersupport'),
        'add_new'               => __('Agregar Nuevo', 'peersupport'),
        'new_item'              => __('Nuevo Curso', 'peersupport'),
        'edit_item'             => __('Editar Curso', 'peersupport'),
        'update_item'           => __('Actualizar Curso', 'peersupport'),
        'view_item'             => __('Ver Curso', 'peersupport'),
        'view_items'            => __('Ver Cursos', 'peersupport'),
        'search_items'          => __('Buscar Curso', 'peersupport'),
        'not_found'             => __('No encontrado', 'peersupport'),
        'not_found_in_trash'    => __('No encontrado en papelera', 'peersupport'),
    );

    $args = array(
        'label'                 => __('Curso', 'peersupport'),
        'description'           => __('Cursos de formación', 'peersupport'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('curso', $args);
}
add_action('init', 'peersupport_register_cursos_post_type', 0);

/**
 * Add custom meta boxes for Cursos
 */
function peersupport_add_curso_meta_boxes() {
    add_meta_box(
        'curso_details',
        __('Detalles del Curso', 'peersupport'),
        'peersupport_curso_details_callback',
        'curso',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'peersupport_add_curso_meta_boxes');

/**
 * Curso meta box callback
 */
function peersupport_curso_details_callback($post) {
    wp_nonce_field('peersupport_save_curso_details', 'peersupport_curso_nonce');

    $duration = get_post_meta($post->ID, '_curso_duration', true);
    $audience = get_post_meta($post->ID, '_curso_audience', true);
    $price = get_post_meta($post->ID, '_curso_price', true);
    $hotmart_url = get_post_meta($post->ID, '_curso_hotmart_url', true);
    $badge = get_post_meta($post->ID, '_curso_badge', true);
    ?>

    <p>
        <label for="curso_duration"><strong><?php _e('Duración:', 'peersupport'); ?></strong></label><br>
        <input type="text" id="curso_duration" name="curso_duration" value="<?php echo esc_attr($duration); ?>" placeholder="Ej: 8 semanas" style="width: 100%;">
    </p>

    <p>
        <label for="curso_audience"><strong><?php _e('Público Objetivo:', 'peersupport'); ?></strong></label><br>
        <input type="text" id="curso_audience" name="curso_audience" value="<?php echo esc_attr($audience); ?>" placeholder="Ej: Profesionales" style="width: 100%;">
    </p>

    <p>
        <label for="curso_price"><strong><?php _e('Precio:', 'peersupport'); ?></strong></label><br>
        <input type="text" id="curso_price" name="curso_price" value="<?php echo esc_attr($price); ?>" placeholder="Ej: $49.99 USD o A confirmar" style="width: 100%;">
    </p>

    <p>
        <label for="curso_hotmart_url"><strong><?php _e('URL de Hotmart:', 'peersupport'); ?></strong></label><br>
        <input type="url" id="curso_hotmart_url" name="curso_hotmart_url" value="<?php echo esc_url($hotmart_url); ?>" placeholder="https://go.hotmart.com/..." style="width: 100%;">
    </p>

    <p>
        <label for="curso_badge"><strong><?php _e('Badge:', 'peersupport'); ?></strong></label><br>
        <select id="curso_badge" name="curso_badge" style="width: 100%;">
            <option value="Próximamente" <?php selected($badge, 'Próximamente'); ?>>Próximamente</option>
            <option value="Disponible" <?php selected($badge, 'Disponible'); ?>>Disponible</option>
            <option value="Agotado" <?php selected($badge, 'Agotado'); ?>>Agotado</option>
        </select>
    </p>
    <?php
}

/**
 * Save curso meta box data
 */
function peersupport_save_curso_details($post_id) {
    // Check nonce
    if (!isset($_POST['peersupport_curso_nonce']) || !wp_verify_nonce($_POST['peersupport_curso_nonce'], 'peersupport_save_curso_details')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save fields
    if (isset($_POST['curso_duration'])) {
        update_post_meta($post_id, '_curso_duration', sanitize_text_field($_POST['curso_duration']));
    }

    if (isset($_POST['curso_audience'])) {
        update_post_meta($post_id, '_curso_audience', sanitize_text_field($_POST['curso_audience']));
    }

    if (isset($_POST['curso_price'])) {
        update_post_meta($post_id, '_curso_price', sanitize_text_field($_POST['curso_price']));
    }

    if (isset($_POST['curso_hotmart_url'])) {
        update_post_meta($post_id, '_curso_hotmart_url', esc_url_raw($_POST['curso_hotmart_url']));
    }

    if (isset($_POST['curso_badge'])) {
        update_post_meta($post_id, '_curso_badge', sanitize_text_field($_POST['curso_badge']));
    }
}
add_action('save_post_curso', 'peersupport_save_curso_details');

/**
 * Theme Customizer
 */
function peersupport_customize_register($wp_customize) {
    // Social Media Section
    $wp_customize->add_section('peersupport_social_media', array(
        'title'    => __('Redes Sociales', 'peersupport'),
        'priority' => 30,
    ));

    // Instagram URL
    $wp_customize->add_setting('instagram_url', array(
        'default'           => 'https://www.instagram.com/peersupportargentina/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label'    => __('URL de Instagram', 'peersupport'),
        'section'  => 'peersupport_social_media',
        'type'     => 'url',
    ));

    // Facebook URL
    $wp_customize->add_setting('facebook_url', array(
        'default'           => 'https://www.facebook.com/peersupportargentina',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_url', array(
        'label'    => __('URL de Facebook', 'peersupport'),
        'section'  => 'peersupport_social_media',
        'type'     => 'url',
    ));

    // Twitter URL
    $wp_customize->add_setting('twitter_url', array(
        'default'           => 'https://twitter.com/peersupportar',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('twitter_url', array(
        'label'    => __('URL de Twitter', 'peersupport'),
        'section'  => 'peersupport_social_media',
        'type'     => 'url',
    ));

    // WhatsApp Number
    $wp_customize->add_setting('whatsapp_number', array(
        'default'           => '5491112345678',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('whatsapp_number', array(
        'label'    => __('Número de WhatsApp (con código de país)', 'peersupport'),
        'section'  => 'peersupport_social_media',
        'type'     => 'text',
    ));

    // Email
    $wp_customize->add_setting('email_url', array(
        'default'           => 'info@peersupport.org.ar',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('email_url', array(
        'label'    => __('Email de contacto', 'peersupport'),
        'section'  => 'peersupport_social_media',
        'type'     => 'email',
    ));

    // Contact Information Section
    $wp_customize->add_section('peersupport_contact_info', array(
        'title'    => __('Información de Contacto', 'peersupport'),
        'priority' => 31,
    ));

    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'info@peersupport.org.ar',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'    => __('Email de contacto (footer)', 'peersupport'),
        'section'  => 'peersupport_contact_info',
        'type'     => 'email',
    ));

    // Location
    $wp_customize->add_setting('contact_location', array(
        'default'           => 'Buenos Aires, Argentina',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_location', array(
        'label'    => __('Ubicación', 'peersupport'),
        'section'  => 'peersupport_contact_info',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'peersupport_customize_register');

/**
 * Excerpt length
 */
function peersupport_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'peersupport_excerpt_length');

/**
 * Excerpt more
 */
function peersupport_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'peersupport_excerpt_more');

/**
 * Contact Form - Admin Settings Page
 */
function peersupport_contact_settings_menu() {
    add_options_page(
        __('Configuración de Formulario de Contacto', 'peersupport'),
        __('Formulario de Contacto', 'peersupport'),
        'manage_options',
        'peersupport-contact-settings',
        'peersupport_contact_settings_page'
    );
}
add_action('admin_menu', 'peersupport_contact_settings_menu');

/**
 * Register settings
 */
function peersupport_contact_settings_init() {
    register_setting('peersupport_contact_settings', 'peersupport_resend_api_key');
    register_setting('peersupport_contact_settings', 'peersupport_resend_from_email');
}
add_action('admin_init', 'peersupport_contact_settings_init');

/**
 * Settings page HTML
 */
function peersupport_contact_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('peersupport_contact_settings');
            do_settings_sections('peersupport_contact_settings');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="peersupport_resend_api_key"><?php _e('Resend API Key', 'peersupport'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="peersupport_resend_api_key" name="peersupport_resend_api_key" value="<?php echo esc_attr(get_option('peersupport_resend_api_key')); ?>" class="regular-text" />
                        <p class="description"><?php _e('Ingresá tu API Key de Resend. Podés obtenerla en https://resend.com/api-keys', 'peersupport'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="peersupport_resend_from_email"><?php _e('Email remitente', 'peersupport'); ?></label>
                    </th>
                    <td>
                        <input type="email" id="peersupport_resend_from_email" name="peersupport_resend_from_email" value="<?php echo esc_attr(get_option('peersupport_resend_from_email', 'onboarding@resend.dev')); ?>" class="regular-text" />
                        <p class="description"><?php _e('Email desde el cual se enviarán los mensajes. Por defecto usa el dominio de testing de Resend (onboarding@resend.dev). Para producción, verificá tu dominio en Resend y usá tu propio email.', 'peersupport'); ?></p>
                    </td>
                </tr>
            </table>
            <?php submit_button(__('Guardar Configuración', 'peersupport')); ?>
        </form>
    </div>
    <?php
}

/**
 * Handle contact form submission via AJAX
 */
function peersupport_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'peersupport_contact_form')) {
        wp_send_json_error(array('message' => __('Error de seguridad. Por favor, recargá la página e intentá nuevamente.', 'peersupport')));
    }

    // Validate and sanitize inputs
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Validation
    $errors = array();

    if (empty($name)) {
        $errors[] = __('El nombre es requerido.', 'peersupport');
    }

    if (empty($email) || !is_email($email)) {
        $errors[] = __('El email es inválido.', 'peersupport');
    }

    if (empty($subject)) {
        $errors[] = __('El asunto es requerido.', 'peersupport');
    }

    if (empty($message)) {
        $errors[] = __('El mensaje es requerido.', 'peersupport');
    }

    if (!empty($errors)) {
        wp_send_json_error(array('message' => implode(' ', $errors)));
    }

    // Get Resend API key
    $api_key = get_option('peersupport_resend_api_key');
    if (empty($api_key)) {
        wp_send_json_error(array('message' => __('El formulario no está configurado correctamente. Por favor, contactá al administrador.', 'peersupport')));
    }

    // Get recipient email from customizer
    $to_email = get_theme_mod('email_url', 'info@peersupport.org.ar');
    $from_email = get_option('peersupport_resend_from_email', 'onboarding@resend.dev');

    // Prepare email content with a professional design matching the site identity
    $email_subject = sprintf(__('Nueva consulta de %s', 'peersupport'), $name);
    $email_body = "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
      <meta charset='UTF-8'>
      <style>
        body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #2a2a2a; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f8f9fa; }
        .header { background: linear-gradient(135deg, #2c5f6f 0%, #1a3d47 100%); color: white; padding: 40px 30px; border-radius: 8px 8px 0 0; text-align: center; box-shadow: 0 4px 15px rgba(44, 95, 111, 0.2); }
        .header h1 { margin: 0; font-family: 'Crimson Text', Georgia, serif; font-size: 28px; font-weight: 700; letter-spacing: 0.5px; }
        .header p { margin: 10px 0 0 0; opacity: 0.9; font-size: 14px; font-weight: 400; letter-spacing: 1px; text-transform: uppercase; }
        .content { background: #ffffff; padding: 40px 30px; border-radius: 0 0 8px 8px; border: 1px solid #e0e4e8; border-top: none; }
        .field { margin-bottom: 25px; padding: 0; }
        .field-label { font-family: 'Inter', sans-serif; font-weight: 600; color: #4a8a9d; font-size: 11px; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 8px; display: block; }
        .field-value { color: #2a2a2a; font-size: 16px; font-weight: 400; border-bottom: 1px solid #f0f2f4; padding-bottom: 12px; }
        .message-box { background: #f8f9fa; padding: 25px; border-radius: 8px; border-left: 4px solid #d4a574; margin-top: 30px; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #e0e4e8; font-size: 13px; color: #7a7a7a; text-align: center; }
        a { color: #2c5f6f; text-decoration: none; font-weight: 600; }
        a:hover { color: #1a3d47; text-decoration: underline; }
      </style>
    </head>
    <body>
      <div class='header'>
        <h1>Nueva Consulta</h1>
        <p>Peer Support Argentina</p>
      </div>
      <div class='content'>
        <div class='field'>
          <span class='field-label'>De</span>
          <div class='field-value'>" . esc_html($name) . "</div>
        </div>

        <div style='display: grid; grid-template-columns: 1fr 1fr; gap: 20px;'>
          <div class='field'>
            <span class='field-label'>Email</span>
            <div class='field-value'><a href='mailto:" . esc_attr($email) . "'>" . esc_html($email) . "</a></div>
          </div>
          " . ($phone ? "
          <div class='field'>
            <span class='field-label'>Teléfono</span>
            <div class='field-value'>" . esc_html($phone) . "</div>
          </div>" : "") . "
        </div>

        <div class='field' style='margin-top: 10px;'>
          <span class='field-label'>Asunto</span>
          <div class='field-value' style='border-bottom: none; padding-bottom: 0; font-size: 18px; font-family: \"Crimson Text\", serif; font-weight: 700; color: #2c5f6f;'>" . esc_html($subject) . "</div>
        </div>

        <div class='message-box'>
          <span class='field-label' style='color: #8b9d83; margin-bottom: 12px;'>Mensaje</span>
          <div class='field-value' style='white-space: pre-wrap; color: #2a2a2a; line-height: 1.8; border-bottom: none; padding-bottom: 0;'>" . nl2br(esc_html($message)) . "</div>
        </div>

        <div class='footer'>
          <p>Mensaje enviado desde <strong>peersupport.org.ar</strong></p>
          <p style='margin-top: 5px;'>Este correo fue generado automáticamente por el formulario de contacto.</p>
        </div>
      </div>
    </body>
    </html>";

    // Send email via Resend API
    $response = wp_remote_post('https://api.resend.com/emails', array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type' => 'application/json',
        ),
        'body' => json_encode(array(
            'from' => 'Formulario Web <onboarding@resend.dev>',
            'to' => array($to_email),
            'reply_to' => $email,
            'subject' => $email_subject,
            'html' => $email_body,
        )),
        'timeout' => 15,
    ));

    if (is_wp_error($response)) {
        wp_send_json_error(array('message' => __('Error al enviar el mensaje. Por favor, intentá nuevamente.', 'peersupport')));
    }

    $response_code = wp_remote_retrieve_response_code($response);

    if ($response_code === 200) {
        wp_send_json_success(array('message' => __('¡Gracias por tu mensaje! Te responderemos a la brevedad.', 'peersupport')));
    } else {
        $body = wp_remote_retrieve_body($response);
        error_log('Resend API Error: ' . $body);
        wp_send_json_error(array('message' => __('Error al enviar el mensaje. Por favor, intentá nuevamente más tarde.', 'peersupport')));
    }
}
add_action('wp_ajax_peersupport_contact_form', 'peersupport_handle_contact_form');
add_action('wp_ajax_nopriv_peersupport_contact_form', 'peersupport_handle_contact_form');

/**
 * Enqueue contact form script
 */
function peersupport_contact_form_scripts() {
    if (is_page_template('page-contacto.php')) {
        wp_enqueue_script('peersupport-contact-form', get_template_directory_uri() . '/js/contact-form.js', array('jquery'), '1.0.0', true);

        wp_localize_script('peersupport-contact-form', 'peersupportContact', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('peersupport_contact_form'),
        ));
    }
}
add_action('wp_enqueue_scripts', 'peersupport_contact_form_scripts');

