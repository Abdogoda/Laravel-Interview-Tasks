<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    $tasks = Auth::user()->tasks;
    $totalTasks = $tasks->count();
    $completedTasks = $tasks->where('status', 'completed')->count();
    $pendingTasks = $tasks->where('status', 'pending')->count();
    $overdueTasks = $tasks->where('due_date', '<', Carbon::now())->where('status', '!=', 'completed')->count();
    $totalCategories = Category::count();

    return view('dashboard', [
      'totalTasks' => $totalTasks,
      'completedTasks' => $completedTasks,
      'pendingTasks' => $pendingTasks,
      'overdueTasks' => $overdueTasks,
      'totalCategories' => $totalCategories,
    ]);
  }
}
