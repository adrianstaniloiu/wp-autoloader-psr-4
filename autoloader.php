<?php
/**
 * Autoloader PSR-4 sligthly modified to follow WordPress PHP coding standards
 * https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/
 *
 * @version 1.0.0
 * 
 * @param  string $class_name
 * @param  string $prefix
 * @param  string $dir
 *
 * @copyright https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
 * @author Adrian Staniloiu <adrian.staniloiu@gmail.com>
 */
function wp_autoloader_psr4( $class, $prefix, $base_dir ) {
    // Does the class use the namespace prefix?
    $len = strlen( $prefix );
    if ( strncmp( $prefix, $class, $len ) !== 0 ) {
        // No, move to the next registered autoloader.
        return;
    }

    // Get the relative class name.
    $relative_class = substr( $class, $len );

    // Get class name.
    $class_name = substr( $relative_class, strrpos( $relative_class, '\\' ) + 1 );

    // Replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, 
    // prepend "class-", append with ".php", lowercase filename.
    $file = $base_dir . '/' . strtolower( str_replace( '\\', '/', substr_replace( $relative_class, 'class-' . str_replace( '_', '-', $class_name ) . '.php', strrpos( $relative_class, '\\' ) + 1 ) ) );

    // If the file exists, require it.
    if ( file_exists( $file ) ) {
        require_once $file;
    }
}

