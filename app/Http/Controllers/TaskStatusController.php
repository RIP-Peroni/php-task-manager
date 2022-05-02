<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
use App\Models\TaskStatus;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $taskStatuses = TaskStatus::query()->orderBy('created_at')->get();
        return view('statuses.index', compact('taskStatuses'));
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
        $status = new TaskStatus();
        return view('statuses.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TaskStatusRequest $request)
    {
        $data = $request->validated();
        TaskStatus::query()->create($data);
        flash('Статус успешно создан')->success();

        return redirect(route('task_statuses.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(TaskStatus $taskStatus)
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
     * @param \App\Models\TaskStatus $taskStatus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TaskStatusRequest $request, TaskStatus $taskStatus)
    {
        if (!Auth::check()) {
            abort(403);
        }
        $taskStatus->update($request->validated());
        flash('Статус успешно обновлён')->success();
        return redirect(route('task_statuses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskStatus  $taskStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TaskStatus $taskStatus)
    {
//        dd($taskStatus);
//        if ($taskStatus->tasks()->exists()) {
//            flash('Не удалось удалить статус')->error();
//            return back();
//        }
        $taskStatus->delete();
        flash('Статус успешно удалён')->success();

        return redirect()->route('task_statuses.index');
    }
}
