# WP PSR-4 Autoloader
### How to use?
```php
add_action( 'init', function() {
    spl_autoload_register( function( $class ) {
        wp_autoloader_psr4( $class, 'MyNamespace\\', get_template_directory() );
    } );
} );
```
