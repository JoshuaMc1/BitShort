<?php

namespace App\Http\Controllers;

use App\Models\Short;
use Lib\Http\Request;
use Lib\Support\Validator\Validator;
use Illuminate\Support\Str;

class ShortController
{
    public function index()
    {
        return view('index');
    }

    public function generate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'url' => ['required', 'url'],
        ]);

        if (!empty($validate)) {
            session()->setFlash('error', implode('</br>', $validate['url']));
            return redirect(route('index'));
        }

        $short = Short::create([
            'long_url' => $request->input('url'),
            'short_code' => Str::random(8),
            'hits' => 0
        ]);

        session()->setFlash('url', url($short->short_code, false));
        return redirect(route('index'));
    }

    public function redirect(string $short)
    {
        $short = Short::where('short_code', $short)->firstOrFail();
        $short->increment('hits');

        return redirect($short->long_url);
    }
}
