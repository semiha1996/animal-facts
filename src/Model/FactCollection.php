<?php

namespace App\Model;

use ArrayObject;
use App\Exception\InvalidCollectionObjectException;

/**
 * Collection with Fact objects
 *
 * This class extends the built-in ArrayObject and override the offsetSet() method
 * to validate that all set values are Fact objects
 *
 * @author semiha
 */
class FactCollection extends ArrayObject
{
    protected array $factCollection;
    /**
     * Override the original method to validate the value is Fact object
     *
     * @param type $index - The index that the new value will be set on
     *
     * @param type $newval - The object
     */
    public function offsetSet(mixed $index, mixed $newval)
    {
            $this->ensureFactObject($newval);
            parent::offsetSet($index, $newval);
    }

    /**
     * Validate the object is Fact instance
     *
     * @param type $object - The object to be checked
     *
     * @throws InvalidCollectionObjectException
     */
    protected function ensureFactObject(object $object)
    {
        if (!($object instanceof Fact)) {
            throw new InvalidCollectionObjectException(
                "Object of disallowed class is set to the collection"
            );
        }
    }
}
