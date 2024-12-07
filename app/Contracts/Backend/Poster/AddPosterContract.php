<?php

namespace App\Contracts\Backend\Poster;

use Illuminate\Http\UploadedFile;

interface AddPosterContract
{
    public function setImage(UploadedFile $image): bool|AddPosterContract;

    public function setIdItem(string|int $id): AddPosterContract;

    public function setDirName(string $name): AddPosterContract;

    public function setDirNameForItem(string|int $val): AddPosterContract;

    public function setForeignId(string $val): AddPosterContract;

    public function setTypeImage(?string $type): AddPosterContract;

    public function setHeightAndWidthImageSm(float|int $height, float|int $width): bool|AddPosterContract;

    public function setHeightAndWidthImageLg(float|int $height, float|int $width): bool|AddPosterContract;

    public function makeSmAndLgDirs(): AddPosterContract;

    public function putImageToTmp(): AddPosterContract;

    public function putImage(): bool|AddPosterContract;

    public function deleteImageFromTmp(?bool $val): bool|AddPosterContract;
}
