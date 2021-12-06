<?php

//src/Model/FactCollection

namespace App\Model;

use ArrayObject;
/**
 * Collection with Fact objects
 *
 * This class extends the built-in ArrayObject and override the offsetSet() method 
 * to validate that all set values are Fact objects
 *
 * @author semiha
 */
class FactCollection extends ArrayObject{
    
    /**
     * Override the original method to validate the value is Fact object
     * @param type $index - The index that the new value will be set on
     * @param type $value - The object
     */
    public function offsetSet($index, $newValue) {
        
    }
    
    /**
     * Validate the object is Fact instance
     * @param type $object - The object to be checked
     */
     public function ensureFactObject($object) {
        
    }
}
