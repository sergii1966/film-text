<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\RemovePosterContract;
use Illuminate\Support\Facades\Storage;

class RemovePosterAction implements RemovePosterContract
{
    public function remove(array $data): bool
    {
        if(!$data['path_sm'] || !$data['path_lg']){
            return false;
        }

        if(
            !Storage::disk('images')->delete($data['path_sm'])
            || !Storage::disk('images')->delete($data['path_lg'])){

            return false;
        }

        return true;
    }
}
