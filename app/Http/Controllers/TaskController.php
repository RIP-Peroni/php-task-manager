<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $statusesForFilter = TaskStatus::query()->pluck('name', 'id');
        $usersForFilter = User::query()->pluck('name', 'id');
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id')
            ])
            ->orderBy('created_at')
            ->paginate();
        $filter = $request->filter ?? null;
        return view('tasks.index', compact('tasks', 'statusesForFilter', 'usersForFilter', 'filter'));
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
        $task = new Task();
        $statuses = TaskStatus::query()->pluck('name', 'id');
        $users = User::query()->pluck('name', 'id');
        $labels = Label::query()->pluck('name', 'id');
        return view('tasks.create', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskFormRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(TaskFormRequest $request): Redirector|RedirectResponse|Application
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

    /**taskformr
     * Display the specified resource.
     *
     * @param Task $task
     * @return Application|Factory|View
     */
    public function show(Task $task): View|Factory|Application
    {
        if (!Auth::check()) {
            abort(403);
        }

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Application|Factory|View
     */
    public function edit(Task $task): View|Factory|Application
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
     * @param TaskFormRequest $request
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     */
    public function update(TaskFormRequest $request, Task $task): Redirector|RedirectResponse|Application
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
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        flash('Задача успешно удалена')->success();

        return redirect()->route('tasks.index');
    }
}
