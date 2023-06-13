<?php

namespace App\Http\Controllers;

use App\Models\DefaultMessage;
use Illuminate\Http\Request;
use Mavinoo\Batch\Batch;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DefaultMessage $defaultMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DefaultMessage $defaultMessage)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DefaultMessage $defaultMessage)
    {
        //
    }
}
