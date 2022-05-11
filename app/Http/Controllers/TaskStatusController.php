<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
use App\Models\TaskStatus;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $taskStatuses = TaskStatus::query()->orderBy('created_at')->get();
        return view('statuses.index', compact('taskStatuses'));
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
        $status = new TaskStatus();
        return view('statuses.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskStatusRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(TaskStatusRequest $request): Redirector|RedirectResponse|Application
    {
        $data = $request->validated();
        TaskStatus::query()->create($data);
        flash(__('statuses.Status created successfully'))->success();

        return redirect(route('task_statuses.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TaskStatus $taskStatus
     * @return Application|Factory|View
     */
    public function edit(TaskStatus $taskStatus): View|Factory|Application
    {
        if (!Auth::check()) {
            abort(403);
        }
        return view('statuses.update', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskStatusRequest $request
     * @param TaskStatus $taskStatus
     * @return Application|RedirectResponse|Redirector
     */
    public function update(TaskStatusRequest $request, TaskStatus $taskStatus): Redirector|RedirectResponse|Application
    {
        if (!Auth::check()) {
            abort(403);
        }
        $taskStatus->update($request->validated());
        flash(__('statuses.Status changed successfully'))->success();
        return redirect(route('task_statuses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TaskStatus $taskStatus
     * @return RedirectResponse
     */
    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        if ($taskStatus->tasks()->exists()) {
            flash(__('statuses.Failed to delete status'))->error();
            return back();
        }
        $taskStatus->delete();
        flash(__('statuses.Status deleted successfully'))->success();

        return redirect()->route('task_statuses.index');
    }
}
