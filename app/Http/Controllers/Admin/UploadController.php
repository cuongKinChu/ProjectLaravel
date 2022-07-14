<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploadServices;
use Illuminate\Http\Request;



class UploadController extends Controller
{
    //
    protected $upload;

    /**
     * @param $upload
     */
    public function __construct(UploadServices $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request)
    {
        $url = $this->upload->store($request);
        if ($url !== false)
        {
            return response()->json([
                'error' => false,
                'url' => $url,
            ]);
        }
        return response()->json(['error'=>true]);
    }


}
