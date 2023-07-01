<?php

namespace App\Http\Controllers;

use App\Models\DefaultMessage;
use Illuminate\Http\Request;

class DefaultMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'frontend.message-editor.index',
            [
                'messages' => DefaultMessage::all(),
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->post();
        unset($inputs['_token']);

        $instance = new DefaultMessage;

        $transformed = array_map(fn ($value, $key) => (
            [
                'key' => $key,
                'value' => $value,
            ]
        ), $inputs, array_keys($inputs));

        // Uses https://github.com/mavinoo/laravelBatch
        // to cleanly batch update.
        // See that link for more details on the library
        batch()->update($instance, $transformed, 'key');

        return redirect()->route('message-editor.index');
    }
}
