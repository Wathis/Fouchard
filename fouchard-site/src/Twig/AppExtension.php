<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('give_photo_name', [$this, 'givePhotoName'])
        ];
    }

    /**
     * @var string $value
     * @return string
     */
    public function givePhotoName($value, $suffix = '')
    {
        $fileWithoutSpace =  str_replace('_', ' ', basename($value, $suffix));
        $fileWithoutExtension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileWithoutSpace);
        return ucfirst($fileWithoutExtension);
    }
}