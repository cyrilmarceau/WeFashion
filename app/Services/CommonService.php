<?php

namespace App\Services;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 
class CommonService
{
    
    /**
     * redirectToAdminHomePage
     * Redirect user to admin home page if form was send successfull
     * @param  mixed $message
     * @return void
     */
    public function redirectToAdminProductPageWithMessage($message)
    {
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    /**
     * redirectToAdminHomePage
     * Redirect user to admin category page if form was send successfull
     * @param  mixed $message
     * @return void
     */
    public function redirectToAdminCategoriesWithMessage($message)
    {
        return redirect()->route('admin.product.index')->with('message', $message);
    }
}

?>