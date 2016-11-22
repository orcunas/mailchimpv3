<?php
/**
 * @author Orcun As <orcun@wiggledigital.com>
 * @company Wiggle Digital
 * @since 03/10/16 18:16
 *
 * Wiggle Digital's MailChimp wrapper library's autoloader.  You can use a global autoloader like Composer's.
 * If you don't want to use a global autoloader, use it like this;
 * require_once "<path-to-here>/Wiggle/MailChimp/autoload.php"
 * */

function autoload($class) {

    // project-specific namespace prefix
    $prefix = 'WiggleDigital\\MailChimp\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_register('autoload');