<?php

/**
 * @package Flextype
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;


class Flextype {

    public static $entries = [
        'home' => [
            'title' => 'Home',
            'content' => 'Home content'
        ],
        'about' => [
            'title' => 'About',
            'content' => 'About content'
        ],
    ];

    public static function getEntry($entry)
    {
        return Flextype::$entries[$entry];
    }

    public static function getEntryField($entry, $field)
    {
        return Flextype::$entries[$entry][$field];
    }

    public static function createEntry($entry, $data)
    {
        Flextype::$entries[$entry] = $data;
    }

    public static function updateEntry($entry, $data)
    {
        Flextype::$entries[$entry] = $data;
    }

    public static function deleteEntry($entry)
    {
        unset(Flextype::$entries[$entry]);
    }
}
