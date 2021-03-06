<?php

namespace Flextype;

use Flextype\Component\Arr\Arr;
use Flextype\Component\Http\Http;
use Flextype\Component\Event\Event;
use Flextype\Component\Filesystem\Filesystem;
use Flextype\Component\Registry\Registry;
use Flextype\Component\Token\Token;


class PluginsManager
{

    /**
     * _pluginsChangeStatusAjax
     */
    public static function _pluginsChangeStatusAjax()
    {
        if (Http::post('plugin_change_status')) {
            if (Token::check((Http::post('token')))) {
                $plugin_settings = YamlParser::decode(Filesystem::read(PATH['plugins'] . '/' . Http::post('plugin') . '/' . 'settings.yaml'));
                Arr::set($plugin_settings, 'enabled', (Http::post('status') == 'true' ? true : false));
                Filesystem::write(PATH['plugins'] . '/' . Http::post('plugin') . '/' . 'settings.yaml', YamlParser::encode($plugin_settings));
                Cache::clear();
            } else {
                throw new \RuntimeException("Request was denied because it contained an invalid security token. Please refresh the page and try again.");
            }
        }
    }

    public static function getPluginsManager()
    {
        Registry::set('sidebar_menu_item', 'plugins');

        Event::addListener('onBeforeRequestShutdown', function() {
            PluginsManager::_pluginsChangeStatusAjax();
        });

        Themes::view('admin/views/templates/extends/plugins/list')
            ->assign('plugins_list', Registry::get('plugins'))
            ->display();
    }
}
