<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Auth::user()->tasks()->with('category');

        if ($request->has('trashed') && $request->trashed == 'on') {
            $query->onlyTrashed();
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        if ($request->has('sort_by') && $request->sort_by != '') {
            $sortBy = $request->sort_by;
            if ($sortBy == 'status_asc') {
                $query->orderBy('status', 'asc');
            } elseif ($sortBy == 'status_desc') {
                $query->orderBy('status', 'desc');
            } elseif ($sortBy == 'due_asc') {
                $query->orderBy('due_date', 'asc');
            } elseif ($sortBy == 'due_desc') {
                $query->orderBy('due_date', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $tasks = $query->paginate(15)->withQueryString();

        return view('pages.tasks', compact('categories', 'tasks'));
    }

    public function store(StoreTaskRequest $request)
    {
        Auth::user()->tasks()->create($request->validated());
        return redirect()->back()->with('success', 'Task created successfully.');
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->back()->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    }

    public function restore($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        $task->restore();
        return redirect()->back()->with('success', 'Task restored successfully.');
    }

    public function forceDelete($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        $task->forceDelete();
        return redirect()->back()->with('success', 'Task permanently deleted successfully.');
    }
}
