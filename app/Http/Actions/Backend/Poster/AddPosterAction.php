<?php

namespace App\Http\Actions\Backend\Poster;

use App\Contracts\Backend\Poster\AddPosterContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AddPosterAction implements AddPosterContract
{
    public static string $dirForImageSm = 'sm';
    public static string $dirForImageLg = 'lg';
    public string|int $imageWidthSm = 0;
    public string|int $imageHeightSm = 0;
    public string|int $imageWidthLg = 0;
    public string|int $imageHeightLg = 0;

    public UploadedFile $image;
    public string|int $itemId;
    public string $foreignId;
    public string $typeImage = 'webp';

    public string $dirName;

    public string $path_sm;
    public string $path_lg;
    public string $url_sm;
    public string $url_lg;
    public string $width_sm;
    public string $width_lg;
    public string $height_sm;
    public string $height_lg;

    public function setImage(UploadedFile $image): bool|AddPosterContract
    {
        if ($image && $image instanceof UploadedFile) {
            $this->image = $image;
            return $this;
        }

        return false;
    }

    public function setIdItem(string|int $id): AddPosterContract
    {
        $this->itemId = $id;
        return $this;
    }

    public function setTypeImage(?string $type = null): AddPosterContract
    {
        //Поки тільки webp
        $this->typeImage = $type != 'webp' ?: $this->typeImage;

        return $this;
    }

    public function setForeignId(string $val): AddPosterContract
    {
        $this->foreignId = $val;
        return $this;
    }

    public function setDirName(string $name): AddPosterContract
    {
        $this->dirName = strtolower($name);
        return $this;
    }

    public function setDirNameForItem(string|int $val): AddPosterContract
    {
        $this->dirName .= '/' . $val;
        return $this;
    }

    public function setHeightAndWidthImageSm(float|int $height = 0, float|int $width = 0): bool|AddPosterContract
    {
        $this->imageWidthSm = $width;
        $this->imageHeightSm = $height;

        return $this;
    }

    public function setHeightAndWidthImageLg(float|int $height = 0, float|int $width = 0): AddPosterContract
    {
        $this->imageWidthLg = $width;
        $this->imageHeightLg = $height;

        return $this;
    }

    public function makeSmAndLgDirs(): AddPosterContract
    {
        Storage::disk('images')->makeDirectory($this->getDirSm());
        Storage::disk('images')->makeDirectory($this->getDirLg());

        return $this;
    }

    protected function getDirSm(): string
    {
        return $this->dirName . '/' . self::$dirForImageSm;
    }

    protected function getDirLg(): string
    {
        return $this->dirName . '/' . self::$dirForImageLg;
    }

    protected function getOriginalImageName()
    {
        return $this->image->getClientOriginalName();
    }

    protected function getNewImageName(): string
    {
        return substr(
            str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'),
            0,
            8
        );
    }

    protected function getAbsolutePath(): string
    {
        return $this->dirName . '/' . $this->getOriginalImageName();
    }

    public function putImageToTmp(): AddPosterContract
    {
        Storage::disk('tmp')->putFileAs(
            $this->dirName,
            $this->image,
            $this->getOriginalImageName()
        );

        return $this;
    }

    public function deleteImageFromTmp(?bool $val = true): bool|AddPosterContract
    {
        if ($val) {
            return Storage::disk('tmp')->delete($this->getAbsolutePath());
        }
        return $this;
    }

    public function dataImgToSave(): array
    {
        return [
            $this->foreignId => $this->itemId,
            'path_sm' => $this->path_sm,
            'path_lg' => $this->path_lg,
            'url_sm' => $this->url_sm,
            'url_lg' => $this->url_lg,
            'width_sm' => $this->width_sm,
            'width_lg' => $this->width_lg,
            'height_sm' => $this->height_sm,
            'height_lg' => $this->height_lg
        ];
    }

    public function putImage(): AddPosterContract|bool
    {
        $absolutePathInTmp = Storage::disk('tmp')->path($this->getAbsolutePath());
        $extension = strtolower(pathinfo($absolutePathInTmp, PATHINFO_EXTENSION));

        $file_name = $this->getNewImageName() . '.webp';
        $quality = 75;

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $im = imagecreatefromjpeg($absolutePathInTmp) ?? null;
                break;
            case 'png':
                $im = imagecreatefrompng($absolutePathInTmp) ?? null;
                break;
            case 'gif':
                $im = imagecreatefromgif($absolutePathInTmp) ?? null;
                break;
            case 'webp':
                $im = imagecreatefromwebp($absolutePathInTmp) ?? null;
                break;
            default:
                return false;
        }

        $absolutePathToSaveWebpSm = Storage::disk('images')->path($this->getDirSm()) . '/' . $file_name;
        $absolutePathToSaveWebpLg = Storage::disk('images')->path($this->getDirLg()) . '/' . $file_name;

        if (
            !($im ?? null)
            || !($imSm = $this->imageResize($im, $this->imageWidthSm, $this->imageHeightSm))
            || !(imagewebp($imSm, $absolutePathToSaveWebpSm, $quality))
        ) {
            return false;
        }

        if (
            !($imLg = $this->imageResize($im, $this->imageWidthLg, $this->imageHeightLg))
            || !(imagewebp($imLg, $absolutePathToSaveWebpLg, $quality))
        ) {
            return false;
        }

        if (
            !Storage::disk('images')->exists($this->getDirSm() . '/' . $file_name)
            || !Storage::disk('images')->exists($this->getDirLg() . '/' . $file_name)
        ) {
            return false;
        }

        $this->path_sm = $this->getDirSm() . '/' . $file_name;
        $this->path_lg = $this->getDirLg() . '/' . $file_name;
        $this->url_sm = Storage::disk('images')->url($this->getDirSm() . '/' . $file_name);
        $this->url_lg = Storage::disk('images')->url($this->getDirLg() . '/' . $file_name);
        $this->width_sm = (getimagesize($absolutePathToSaveWebpSm))[0];
        $this->width_lg = (getimagesize($absolutePathToSaveWebpLg))[0];
        $this->height_sm = (getimagesize($absolutePathToSaveWebpSm))[1];
        $this->height_lg = (getimagesize($absolutePathToSaveWebpLg))[1];

        return $this;
    }

    /**
     * @param \GdImage $image
     * @param float $w
     * @param float $h
     * @return false|\GdImage
     */
    public function imageResize(\GdImage $image, float $w = 0, float $h = 0): false|\GdImage
    {
        if ((gettype($image) != "object" || get_class($image) != "GdImage") && $w <= 0 && $h < 0) {
            return $image;
        }

        $oldW = imagesx($image);
        $oldH = imagesy($image);

        $ratio = $oldH / $oldW;

        $h = $h ?: $w * $ratio;

        $imageNew = imagecreatetruecolor($w, $h);
        imagecopyresampled($imageNew, $image, 0, 0, 0, 0, $w, $h, $oldW, $oldH);
        return $imageNew;
    }
}
