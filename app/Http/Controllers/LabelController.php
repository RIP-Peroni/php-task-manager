<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LabelFormRequest;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $labels = Label::query()->orderBy('created_at')->get();
        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
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
     * @param LabelFormRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(LabelFormRequest $request): Redirector|Application|RedirectResponse
    {
        $data = $request->validated();
        Label::query()->create($data);
        flash(__('labels.Label created successfully'))->success();

        return redirect(route('labels.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Label $label
     * @return Application|Factory|View
     */
    public function edit(Label $label): View|Factory|Application
    {
        if (!Auth::check()) {
            abort(403);
        }
        return view('labels.update', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LabelFormRequest $request
     * @param Label $label
     * @return Application|RedirectResponse|Redirector
     */
    public function update(LabelFormRequest $request, Label $label): Redirector|RedirectResponse|Application
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
     * @param Label $label
     * @return RedirectResponse
     */
    public function destroy(Label $label): RedirectResponse
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
