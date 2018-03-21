<?php namespace Haeflimi\IgdbFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Haeflimi\IgdbFieldType\Game\Contract\GameRepositoryInterface;
use Haeflimi\IgdbFieldType\Game\GameRepository;
use Anomaly\Streams\Platform\Model\Igdb\IgdbGamesEntryModel;
use Haeflimi\IgdbFieldType\Game\GameModel;
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

    protected $bindings = [
        IgdbGamesEntryModel::class => GameModel::class,
    ];

    protected $providers = [];

    protected $singletons = [
        GameRepositoryInterface::class => GameRepository::class,
    ];

    protected $overrides = [];

    protected $mobile = [];

    public function register()
    {
    }

    public function map()
    {
    }
}
