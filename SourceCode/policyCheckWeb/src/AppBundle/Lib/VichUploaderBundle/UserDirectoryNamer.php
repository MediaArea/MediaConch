<?php

namespace AppBundle\Lib\VichUploaderBundle;

use Vich\UploaderBundle\Naming\DirectoryNamerInterface;
use Vich\UploaderBundle\Mapping\PropertyMapping;

class UserDirectoryNamer implements DirectoryNamerInterface
{
    /**
     * {@inheritDoc}
     */
    public function directoryName($object, PropertyMapping $mapping)
    {
        if ($object->getUser())
        {
            return $object->getUser()->getId();
        }

        return null;
    }
}
