<?php
/**
 * 
 */

namespace Giorgionetg\PortableBlog;

use Exception;

class Installation {
    
    public function __construct($dbconn = array(), $tables = array())
    {
        if (empty($tables)) {
            throw new Exception('There are any tables on setup');
        }
    }
    
    public function fails()
    {
        return False;
    }
}
