<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\DelPosterContract;
use App\Traits\Backend\Film\DelItemFilmRelation;

class DelPosterAction implements DelPosterContract
{
    use DelItemFilmRelation;
}
