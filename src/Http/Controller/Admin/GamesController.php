<?php namespace Haeflimi\IgdbFieldType\Http\Controller\Admin;

use Haeflimi\IgdbFieldType\Game\Form\GameFormBuilder;
use Haeflimi\IgdbFieldType\Game\Table\GameTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class GamesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param GameTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(GameTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param GameFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(GameFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param GameFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GameFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
