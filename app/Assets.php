<?php

namespace App;

class Assets
{
    private static $manifest;

    public static function style($name)
    {
        if ($file = self::getAsset($name, 'css')) {
            echo '<link rel="stylesheet" type="text/css" href="' . $file . '">';
        }
    }

    public static function script($name, $defer = false)
    {
        if ($file = self::getAsset($name, 'js')) {
            echo '<script src="' . $file . '"' . ($defer ? ' defer' : '') . '></script>';
        }
    }

    public static function enqueue_style($handle, $src = '', $deps = array(), $ver = false, $media = 'all')
    {
        if ($file = self::getAsset($src, 'css')) {
            wp_enqueue_style($handle, $deps, $ver, $media);
        }
    }

    public static function enqueue_script($handle, $src = '', $deps = array(), $ver = false, $in_footer = false)
    {
        if ($file = self::getAsset($src, 'js')) {
            wp_enqueue_script($handle, $deps, $ver, $in_footer);
        }
    }

    public static function getAsset($name, $extension)
    {
        $manifest = self::getManifest();
        $file = !empty($manifest[$name][$extension]) ? $manifest[$name][$extension] : false;

        if (!$file) {
            return false;
        }

        return $file;
    }

    private static function getManifest()
    {
        if(!isset(self::$manifest)) {

            $dir = isset($GLOBALS['dist-directory']) ? $GLOBALS['dist-directory'] : dirname(__DIR__) . '/public/dist/';

            if (file_exists($dir . 'manifest.json')) {
                self::$manifest = json_decode(file_get_contents($dir . 'manifest.json'), true);
            } else {
                self::$manifest = false;
            }
        }

        return self::$manifest;
    }
}
