<?php


namespace App\Http\Services\Slide;

use App\Models\Slide;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SlideService
{
    public function get()
    {
        return Slide::orderByDesc('id')->paginate(15);
    }

    public function show()
    {
        return Slide::get();
    }


    public function destroy($request)
    {
        $slide = Slide::where('id', $request->input('id'))->first();
        if ($slide) {
            $path = str_replace('images', 'public', $slide->image);
            Storage::delete($path);
            $slide->delete();
            return true;
        }

        return false;
    }

}
