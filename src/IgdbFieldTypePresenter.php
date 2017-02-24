<?php namespace Haeflimi\IgdbFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class IgdbFieldTypePresenter
 * @author  Michael Häfliger <tuborg@turicane.ch>
 * @package Haeflimi\IgdbFieldType
 */
class IgdbFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The Igdb field type.
     *
     * @var IgdbFieldType
     */
    protected $object;

    /**
     * Return the Game Name
     *
     * @return string
     */
    public function name()
    {
        $value = $this->object->getValue();
        return $value['name'];
    }

}
