<?php

class tx_easygooglemap_link
{
    function returnFieldJS()
    {
        return "
            if(value.startsWith('http://') || value.startsWith('https://'))
            {
              return value;
            }
            return 'http://' + value;
        ";
    }
}
