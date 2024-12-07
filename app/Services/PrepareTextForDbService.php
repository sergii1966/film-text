<?php

namespace App\Services;

use Mews\Purifier\Facades\Purifier;

class PrepareTextForDbService
{

    public function text(?string $text = null): string|null
    {
        if(!$text){
            return Null;
        }

        return Purifier::clean($text);
    }
}
