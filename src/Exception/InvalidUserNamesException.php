<?php

//src/Exception/InvalidUserNamesException.php

namespace App\Exception;

/**
 * InvalidUserNamesException is thrown when an array without "first" or "last" 
 * index is tried to be set for user names.
 *
 * @author semiha
 */
class InvalidUserNamesException extends InvalidArgumentException
{
    //put your code here
}