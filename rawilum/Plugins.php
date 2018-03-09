<?php
namespace Rawilum;

use Symfony\Component\Yaml\Yaml;

/**
 * This file is part of the Rawilum.
 *
 * (c) Romanenko Sergey / Awilum <awilum@msn.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Plugins
{
    /**
     * @var Rawilum
     */
    protected $rawilum;

    /**
     * __construct
     */
    public function __construct(Rawilum $c)
    {
        $this->rawilum = $c;

        $rawilum = $this->rawilum;

        $plugin_manifest = [];

        // Get Plugins List
        $plugins_list = $this->rawilum['config']->get('site.plugins');

        // @TODO THIS with cache then
        // If Plugins List isnt empty
        if (is_array($plugins_list) && count($plugins_list) > 0) {

            // Go through...
            foreach ($plugins_list as $plugin) {
                if (file_exists($_plugin_manifest = PLUGINS_PATH . '/' . $plugin . '/' . $plugin . '.yml')) {
                    $plugin_manifest = Yaml::parse(file_get_contents($_plugin_manifest));
                }

                $_plugins_config[basename($_plugin_manifest)] = array_merge($plugin_manifest, $plugin_settings);
            }
        }

        if (is_array($this->rawilum['config']->get('site.plugins')) && count($this->rawilum['config']->get('site.plugins')) > 0) {
            foreach ($this->rawilum['config']->get('site.plugins') as $plugin_id => $plugin_name) {
                include_once PLUGINS_PATH .'/'. $plugin_name .'/'. $plugin_name . '.php';
            }
        }
    }

    public function init() {

    }
}