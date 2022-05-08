<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::query()->orderBy('created_at')->get();
        return view('tasks.index', compact('tasks'));
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
        $task = new Task();
        $statuses = TaskStatus::query()->pluck('name', 'id');
        $users = User::query()->pluck('name', 'id');
        $labels = Label::query()->pluck('name', 'id');
        return view('tasks.create', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TaskFormRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $task = $user->tasks()->make();
        $task->fill($data)->save();
        $labels = collect($request->input('labels'))->filter(fn($label) => isset($label));
        $task->labels()->attach($labels);

        flash('Задача успешно создана')->success();

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Task $task)
    {
        if (!Auth::check()) {
            abort(403);
        }

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Task $task)
    {
        if (!Auth::check()) {
            abort(403);
        }
        $statuses = TaskStatus::query()->pluck('name', 'id');
        $users = User::query()->pluck('name', 'id');
        $labels = Label::query()->pluck('name', 'id');

        return view('tasks.update', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TaskFormRequest $request, Task $task)
    {
        if (!Auth::check()) {
            abort(403);
        }
        $task->update($request->validated());
        $labels = collect($request->input('labels'))->filter(fn($label) => isset($label));
        $task->labels()->detach();
        $task->labels()->attach($labels);
        flash('Задача успешно обновлена')->success();
        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task): \Illuminate\Http\RedirectResponse
    {
        $task->delete();
        flash('Задача успешно удалена')->success();

        return redirect()->route('tasks.index');
    }
}
