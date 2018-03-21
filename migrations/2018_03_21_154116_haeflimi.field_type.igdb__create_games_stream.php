<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class HaeflimiFieldTypeIgdbCreateGamesStream extends Migration
{
    protected $fields = [
        'igdb_id' => [
            'namespace' => 'games',
            'type' => 'anomaly.field_type.text',
        ],
        'name' => [
            'namespace' => 'games',
            'type' => 'anomaly.field_type.text',
        ],
        'slug' => [
            'namespace' => 'games',
            'type' => 'anomaly.field_type.text',
        ],
        'cover' => [
            'namespace' => 'games',
            'type' => 'anomaly.field_type.text',
        ],
        'release' => [
            'namespace' => 'games',
            'type' => 'anomaly.field_type.text',
        ],
    ];


    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'games',
         'title_column' => 'name',
         'translatable' => false,
         'trashable' => false,
         'searchable' => true,
         'sortable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'translatable' => true,
            'required' => true,
        ],
        'slug' => [
            'unique' => true,
            'required' => true,
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    }

}
