<?php namespace Haeflimi\IgdbFieldType\Game;

use Haeflimi\IgdbFieldType\Game\Contract\GameRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class GameRepository extends EntryRepository implements GameRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var GameModel
     */
    protected $model;

    /**
     * Create a new GameRepository instance.
     *
     * @param GameModel $model
     */
    public function __construct(GameModel $model)
    {
        $this->model = $model;
    }
}
