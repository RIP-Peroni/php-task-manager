<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelFormRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $labels = Label::query()->orderBy('created_at')->get();
        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (!Auth::check()) {
            abort(403);
        }
        $label = new Label();
        return view('labels.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(LabelFormRequest $request)
    {
        $data = $request->validated();
        Label::query()->create($data);
        flash(__('labels.Label created successfully'))->success();

        return redirect(route('labels.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Label $label)
    {
        if (!Auth::check()) {
            abort(403);
        }
        return view('labels.update', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(LabelFormRequest $request, Label $label)
    {
        if (!Auth::check()) {
            abort(403);
        }
        $label->update($request->validated());
        flash(__('labels.Label changed successfully'))->success();
        return redirect(route('labels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Label $label)
    {
        if ($label->tasks()->exists()) {
            flash(__('labels.Failed to delete label'))->error();
            return back();
        }
        $label->delete();
        flash(__('labels.Label deleted successfully'))->success();

        return redirect()->route('labels.index');
    }
}
