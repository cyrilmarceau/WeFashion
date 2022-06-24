<?php

namespace App\Services;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 
class ProductService
{
        
    /**
     * setPictureToStore
     *  Upload picture on folder image localy
     * @param  mixed $picture
     * @return string
     */
    public function setPictureToStore($picture): string
    {
        $link = $picture->store('images');
        return $link;
    }
    
    /**
     * getImageName
     * Retrieve image name for link
     * @param  mixed $link
     * @return string
     */
    public function getImageName(string $link): string
    {
        $imgName = substr($link, strrpos($link, '/') + 1);
        return $imgName;
    }
}

?>