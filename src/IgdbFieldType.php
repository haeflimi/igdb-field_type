<?php namespace Haeflimi\IgdbFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
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
    protected $gameData = null;

    public function __construct()
    {
        $key = (Config::get('haeflimi.field_type.igdb::config.settings.api_key'))? Config::get('haeflimi.field_type.igdb::config.settings.api_key') : Config::get('igdb.key') ;
        $url = (Config::get('haeflimi.field_type.igdb::config.settings.api_url'))? Config::get('haeflimi.field_type.igdb::config.settings.api_url') : Config::get('igdb.url') ;
        $this->igdbConnection = new IGDB($key, $url);
    }

    /**
     * Get the Game Data Set
     *
     * @return array|null
     */
    public function getGameData()
    {
        return $this->gameData;
    }

    /**
     * Set the Game Data
     *
     * @param  array $colors
     * @return $this
     */
    public function setGameData($id)
    {
        $this->gameData = array();

        return $this;
    }

    /**
     * Search for a Game over the IGDB API
     *
     * @return string
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
     */
    public function getGame($id){
        return $this->igdbConnection->getGame($id);
    }


    /**
     * Returns JSON for the Games search AJAX Call
     *
     * @return string
     */
    public function ajaxSearch(){
        $q = Input::get('q');
        $results = $this->searchGame($q);
        return json_encode($results);
    }
}
