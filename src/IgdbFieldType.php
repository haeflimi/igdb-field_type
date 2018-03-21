<?php namespace Haeflimi\IgdbFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Haeflimi\IgdbFieldType\Game\GameCollection;
use Messerli90\IGDB\IGDB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;

/**
 * Class IgdbGamesFieldType
 * @author  Michael Häfliger <tuborg@turicane.ch>
 * @package Haeflimi\IgdbFieldType
 */
class IgdbFieldType extends FieldType
{
    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'haeflimi.field_type.igdb::input';
    protected $igdbConnection;
    protected $igdbId;

    public function __construct()
    {
        $key = (Config::get('haeflimi.field_type.igdb::config.settings.api_key'))? Config::get('haeflimi.field_type.igdb::config.settings.api_key') : Config::get('igdb.key') ;
        $url = (Config::get('haeflimi.field_type.igdb::config.settings.api_url'))? Config::get('haeflimi.field_type.igdb::config.settings.api_url') : Config::get('igdb.url') ;
        $this->igdbConnection = new IGDB($key, $url);
    }

    /**
     * Check if the Field is allowed to save multiple entries
     *
     * @return mixed
     */
    public function getMultiple()
    {
        return $this->config('multiple');
    }

    /**
     * Get the predetermined options from the games stream
     *
     * @return array
     */
    public function getAllOptions()
    {
        $games = new GameCollection();
        $games->sorted('asc')->undecorated();
        return $games->toArray();
    }


    /**
     * Search for a Game over the IGDB API
     * @param string search Query
     * @return string
     * @throws \Exception
     */
    public function searchGame($q){
        $list = $this->igdbConnection->searchGames($q,array('id','slug','name','cover','first_release_date'), 5, 0, $order = 'popularity:desc');
        return $list;
    }

    /**
     * Get a specific Game from the IGDB API
     *
     * @param $id
     * @return \StdClass
     * @throws \Exception
     */
    public function getGame($id){
        return $this->igdbConnection->getGame($id);
    }


    /**
     * Returns JSON for the Games search AJAX Call
     *
     * @return string
     * @throws \Exception
     */
    public function ajaxSearch(){
        $q = Input::get('q');
        $results = $this->searchGame($q);
        return json_encode($results);
    }
}
