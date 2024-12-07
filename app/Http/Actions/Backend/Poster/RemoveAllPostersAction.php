<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\RemoveAllPostersContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class RemoveAllPostersAction implements RemoveAllPostersContract
{
    public function remove(Collection $data): bool
    {
        foreach ($data as $image) {
            if (
                !Storage::disk('images')->delete($image->path_sm)
                || !Storage::disk('images')->delete($image->path_lg)) {
                return false;
            }
        }

        return true;
    }
}
