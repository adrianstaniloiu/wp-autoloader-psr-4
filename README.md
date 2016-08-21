# wp-psr-4-autoloader
# How to use?
```php
add_action( 'some_action', function() {
    spl_autoload_register( function( $class ) {
        Includes\autoload( $class, 'MyNamespace\\', get_template_directory() );
    } );
}, 40 );
```
