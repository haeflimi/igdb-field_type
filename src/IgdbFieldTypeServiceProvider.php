<?php namespace Haeflimi\IgdbFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Support\Facades\Config;

/**
 * Class IgdbFieldTypeServiceProvider
 * @author  Michael Häfliger <tuborg@turicane.ch>
 * @package Haeflimi\IgdbFieldType
 */
class IgdbFieldTypeServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $commands = [];

    protected $routes = [
        'igdb/search' => 'Haeflimi\IgdbFieldType\IgdbFieldType@ajaxSearch',
    ];

    protected $middleware = [];

    protected $listeners = [];

    protected $aliases = [];

    protected $bindings = [];

    protected $providers = [];

    protected $singletons = [];

    protected $overrides = [];

    protected $mobile = [];

    public function register()
    {
    }

    public function map()
    {
    }
}
