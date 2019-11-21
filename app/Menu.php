<?php

namespace App;

class Menu
{
    private static function buildLayer(array &$elements, $parentId = 0, $queriedObject)
    {
        $branch = [];
        foreach ($elements as &$element) {
            if ($element->menu_item_parent == $parentId) {
                $children = static::buildLayer($elements, $element->ID, $queriedObject);
                if ($children) {
                    $element->wpse_children = $children;
                }
                    
                // Add current page flags if relevant
                switch ($element->type) {
                    case 'post_type':
                        $element->current = is_a($queriedObject, 'WP_Post') && $element->object_id == $queriedObject->ID;
                        break;

                    case 'taxonomy':
                        $element->current = is_a($queriedObject, 'WP_Term') && $element->object_id == $queriedObject->term_id;
                        break;

                    default:
                        $element->current = false;
                }
                
                foreach ($children as $child) {
                    if ($child->current) {
                        $element->current = true;
                    }
                }

                if (isset($_SERVER['REQUEST_URI'])) {
                    $current_url = rtrim(url()->current(), '/');
                    $element_url = rtrim($element->url, '/');
                    if ($current_url === $element_url) {
                        $element->current = true;
                    }
                }

                $branch[$element->ID] = $element;
                unset($element);
                unset($element);
            }
        }

        return $branch;
    }

    public static function get($menuID)
    {
        if (!isset($menuID)) return [];

        $items = wp_get_nav_menu_items($menuID);
        if (empty($items)) return [];

        $queriedObject = get_queried_object();
        $menu = static::buildLayer($items, 0, $queriedObject);

        return $menu;
    }

    public static function getByLocation($location) {
        $locations = get_nav_menu_locations();
        if (!isset($locations[$location])) return [];
        $menu = get_term( $locations[$location], 'nav_menu' );
        $items = wp_get_nav_menu_items($menu->term_id);
        if (empty($items)) return [];

        $queriedObject = get_queried_object();
        $menu = static::buildLayer($items, 0, $queriedObject);

        return $menu;
    }

    /**
     * Check if the current page has submenu items.
     *
     * @param $menuID
     * @param integer|null $pageID
     *
     * @return bool
     */
    public static function hasSubMenu($menuID, $pageID = null)
    {
        if (!isset($pageID)) $pageID = get_the_ID();

        $items = wp_get_associated_nav_menu_items($pageID);

        $items = array_filter($items, function ($item) use ($pageID) {
            return !(int)$item->ID === $pageID;
        });

        return count($items) > 0;
    }

    /**
     * Get the ID of an associated sub menu the page is in (if any).
     *
     * @param $pageID
     * @param array $items
     *
     * @return int
     */
    public static function getSubMenuID($pageID, array &$items)
    {
        foreach ($items as $key => &$item) {
            if ((int)$item->object_id === $pageID) {
                return $item->menu_item_parent > 0 ? (int)$item->menu_item_parent : $item->ID;
            }
        }

        return -1;
    }

    /**
     * Get the submenu items associated with the page (if any).
     *
     * @param integer menuID
     * @param integer|null $pageID
     *
     * @return array
     */
    public static function getSubMenu($menuID, $pageID = null)
    {
        if (!isset($pageID)) $pageID = get_the_ID();

        $items = wp_get_nav_menu_items($menuID);
        $parentID = static::getSubMenuID($pageID, $items);

        if ($parentID <= 0) return;

        // Filter items that are not part of the submenu
        array_filter($items, function (&$item) use ($parentID) {
            return !(int)$item->menu_item_parent === $parentID;
        });

        return static::buildLayer($items, $parentID, get_queried_object());
    }
}