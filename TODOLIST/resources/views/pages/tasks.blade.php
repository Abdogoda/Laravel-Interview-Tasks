<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap items-center gap-4">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tasks</h2>
        <button
              class="px-6 py-2 bg-indigo-600 text-white rounded-xl shadow-lg hover:bg-indigo-700 transition font-semibold"
              onclick="openModal('addTaskModal')"
            >
              + Add Task
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <div class="flex flex-wrap gap-4 mb-4 items-center justify-between">
                <form
                  action=""
                  method="get"
                  class="w-full flex flex-wrap gap-4 items-center justify-between bg-gray-900/80 rounded-2xl shadow-lg px-6 py-4 border border-gray-800"
                >
                  <div class="relative">
                    <select
                      name="status"
                      class="pl-10 pr-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    >
                      <option value="">Status: All</option>
                      <option {{request()->status == 'completed' ? 'selected' : ''}} value="completed">Completed</option>
                      <option {{request()->status == 'pending' ? 'selected' : ''}} value="pending">Pending</option>
                      <option {{request()->status == 'in_progress' ? 'selected' : ''}} value="in_progress">In Progress</option>
                    </select>
                    <span class="absolute left-3 top-2.5 text-indigo-400">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"
                        />
                      </svg>
                    </span>
                  </div>
                  <div class="relative">
                    <select
                      name="category"
                      class="pl-10 pr-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    >
                      <option value="">Category: All</option>
                      @foreach ($categories as $item)
                          <option {{request()->category == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <span class="absolute left-3 top-2.5 text-indigo-400">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <circle cx="12" cy="12" r="10" />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 12h8"
                        />
                      </svg>
                    </span>
                  </div>
                  <div class="relative">
                    <select
                      name="sort_by"
                      class="pl-10 pr-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    >
                      <option value="">Sort by...</option>
                      <option {{request()->has('sort_by') && request()->sort_by == 'due_asc' ? 'selected' : ''}} value="due_asc">Due Date ↑</option>
                      <option {{request()->has('sort_by') && request()->sort_by == 'due_desc' ? 'selected' : ''}} value="due_desc">Due Date ↓</option>
                      <option {{request()->has('sort_by') && request()->sort_by == 'status_asc' ? 'selected' : ''}} value="status_asc">Status ↑</option>
                      <option {{request()->has('sort_by') && request()->sort_by == 'status_desc' ? 'selected' : ''}} value="status_desc">Status ↓</option>
                    </select>
                    <span class="absolute left-3 top-2.5 text-indigo-400">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h8m-8 6h16"
                        />
                      </svg>
                    </span>
                  </div>
                  <label
                    class="inline-flex items-center cursor-pointer select-none"
                  >
                    <input
                      type="checkbox"
                      id="trashedCheckbox"
                      name="trashed"
                      class="peer sr-only"
                      {{ request()->has('trashed') && request()->trashed == 'on' ? 'checked' : '' }}
                    />
                    <span
                      class="px-4 py-2 rounded-xl border-2 font-semibold shadow transition border-red-400 text-red-400 bg-transparent peer-checked:bg-red-900 peer-checked:text-white peer-checked:border-red-900"
                    >
                      Show Trashed
                    </span>
                  </label>
                  <div class="relative flex-1 min-w-[180px]">
                    <input
                      type="text"
                      name="search"
                      placeholder="Search tasks..."
                      value="{{ request()->search ?? '' }}"
                      class="pl-10 pr-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition w-full"
                    />
                    <span class="absolute left-3 top-2.5 text-indigo-400">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 21l-4.35-4.35M11 17a6 6 0 100-12 6 6 0 000 12z"
                        />
                      </svg>
                    </span>
                  </div>
                  <button
                    type="submit"
                    class="px-4 py-2 rounded-xl bg-indigo-600 text-white font-semibold shadow hover:bg-indigo-700 transition flex items-center gap-1"
                  >
                    Apply
                  </button>
                  @if (request()->hasAny(['trashed', 'search', 'status', 'category', 'sort']))
                      <button type="button" onclick="window.location='{{ request()->url() }}'" class="px-4 py-2 rounded-xl bg-gray-600 text-white font-semibold shadow hover:bg-gray-700 transition flex items-center gap-1">
                        Clear Filters
                      </button>
                  @endif
                </form>
              </div>
              <div class="bg-gray-800 shadow-lg overflow-x-auto">
                <table class="min-w-full text-sm">
                  <thead>
                    <tr class="bg-gray-900">
                      <th class="py-3 px-4 text-left font-semibold text-gray-300">
                        Title
                      </th>
                      <th class="py-3 px-4 text-left font-semibold text-gray-300">
                        Description
                      </th>
                      <th class="py-3 px-4 text-left font-semibold text-gray-300">
                        Category
                      </th>
                      <th class="py-3 px-4 text-left font-semibold text-gray-300">
                        Due Date
                      </th>
                      <th class="py-3 px-4 text-left font-semibold text-gray-300">
                        Status
                      </th>
                      <th class="py-3 px-4 text-left font-semibold text-gray-300">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tasks as $item)
                        <tr class="border-b border-gray-700">
                          <td class="py-3 px-4 text-white">{{$item->title}}</td>
                          <td class="py-3 px-4 truncate max-w-xs text-gray-400">
                            {{$item->description}}
                          </td>
                          <td class="py-3 px-4 text-white" style="background-color: {{$item->category->color}}">{!! $item->category->icon !!} {{$item->category->name}}</td>
                          <td class="py-3 px-4 text-{{$item->isOverdue() ? 'red-500' : 'white'}}">{{\Carbon\Carbon::parse($item->due_date)->format('Y-m-d h:i A')}}</td>
                          <td class="py-3 px-4">
                            <span
                              class="inline-flex items-center gap-2 px-3 py-1 rounded-xl text-white font-semibold capitalize"
                              style="background-color: {{$item->getTaskColor()}}"
                              >
                              {!! $item->getTaskIcon() !!}
                              {{str_replace('_', ' ', $item->status)}} </span
                            >
                          </td>
                          <td class="py-3 px-4 flex gap-2">
                            @if ($item->deleted_at)
                                <button
                                  class="px-3 py-1 bg-green-900 text-green-300 rounded-xl hover:bg-green-700 transition restoreTaskBtn"
                                  onclick="openRestoreModal({{ $item->id }})"
                                >
                                  Restore
                                </button>
                                <button
                                  class="px-3 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition deletePermanentTaskBtn"
                                  onclick="openDeletePermanentModal({{ $item->id }})"
                                >
                                  Delete Permanent
                                </button>
                            @else
                                <button
                                  class="px-3 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition editTaskBtn"
                                  onclick="openEditModal({{ $item->id }}, '{{ $item->title }}', '{{ $item->description }}', {{ $item->category_id }}, '{{ $item->status }}', '{{ $item->due_date }}')"
                                >
                                  Edit
                                </button>
                                <button
                                  class="px-3 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition deleteTaskBtn"
                                  onclick="openDeleteModal({{ $item->id }})"
                                >
                                  Delete
                                </button>
                            @endif
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="flex justify-end items-center gap-2 p-4">
                  {{ $tasks->links('pagination::custom') }}
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- Add Task Modal -->
    <div
      id="addTaskModal"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <div
        class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-md text-center"
      >
        <h3 class="text-xl font-bold text-indigo-400 mb-4">Add Task</h3>
        <form method="post" action="{{ route('tasks.store') }}" class="space-y-4">
          @csrf
          <div class="text-left">
            <label
              for="addTaskTitle"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Title</label
            >
            <input
              id="addTaskTitle"
              type="text"
              name="title"
              placeholder="Title"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            />
          </div>
          <div class="text-left">
            <label
              for="addTaskDesc"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Description</label
            >
            <textarea
              id="addTaskDesc"
              name="description"
              placeholder="Description"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            ></textarea>
          </div>
          <div class="text-left">
            <label
              for="addTaskCategory"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Category</label
            >
            <select
              id="addTaskCategory"
              name="category_id"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="text-left">
            <label
              for="addTaskStatus"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Status</label
            >
            <select
              id="addTaskStatus"
              name="status"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              <option value="completed">Completed</option>
              <option value="pending">Pending</option>
              <option value="in_progress">In Progress</option>
            </select>
          </div>
          <div class="text-left">
            <label
              for="addTaskDue"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Due Date</label
            >
            <input
              id="addTaskDue"
              type="datetime-local"
              name="due_date"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            />
          </div>
          <div class="flex gap-2 justify-center">
            <button
              type="submit"
              class="px-6 py-2 bg-emerald-600 text-white rounded-xl shadow-lg hover:bg-emerald-700 transition font-semibold"
            >
              Save
            </button>
            <button
              type="button"
              class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
              onclick="closeModal('addTaskModal')"
            >
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Edit Task Modal -->
    <div
      id="editTaskModal"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <div
        class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-md text-center"
      >
        <h3 class="text-xl font-bold text-indigo-400 mb-4">Edit Task</h3>
        <form method="post" class="space-y-4" id="editTaskForm">
          @csrf
          @method('PUT')
          <div class="text-left">
            <label
              for="editTaskTitle"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Title</label
            >
            <input
              id="editTaskTitle"
              type="text"
              name="title"
              placeholder="Title"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            />
          </div>
          <div class="text-left">
            <label
              for="editTaskDesc"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Description</label
            >
            <textarea
              id="editTaskDesc"
              name="description"
              placeholder="Description"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            ></textarea>
          </div>
          <div class="text-left">
            <label
              for="editTaskCategory"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Category</label
            >
            <select
              id="editTaskCategory"
              name="category_id"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="text-left">
            <label
              for="editTaskStatus"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Status</label
            >
            <select
              id="editTaskStatus"
              name="status"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              <option value="completed">Completed</option>
              <option value="pending">Pending</option>
              <option value="in_progress">In Progress</option>
            </select>
          </div>
          <div class="text-left">
            <label
              for="editTaskDue"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Due Date</label
            >
            <input
              id="editTaskDue"
              type="datetime-local"
              name="due_date"
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            />
          </div>
          <div class="flex gap-2 justify-center">
            <button
              type="submit"
              class="px-6 py-2 bg-emerald-600 text-white rounded-xl shadow-lg hover:bg-emerald-700 transition font-semibold"
            >
              Save
            </button>
            <button
              type="button"
              class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
              onclick="closeModal('editTaskModal')"
            >
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
    
    <!-- Delete Modal -->
    <div
      id="deleteModal"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <form 
        method="post"
        id="deleteTaskForm" 
        class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
      >
      @csrf
      @method('DELETE')
        <h3 class="text-xl font-bold text-red-400 mb-4">Delete Task?</h3>
        <p class="text-gray-300 mb-6">
          Are you sure you want to delete this task?
        </p>
        <div class="flex gap-2 justify-center">
          <button
            class="px-6 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition font-semibold"
          >
            Delete
          </button>
          <button
            class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
            onclick="closeModal('deleteModal')"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>
    
    <!-- Restore Modal -->
    <div
      id="restoreModal"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <form 
        method="post"
        id="restoreTaskForm" 
        class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
      >
      @csrf
        <h3 class="text-xl font-bold text-green-400 mb-4">Restore Task?</h3>
        <p class="text-gray-300 mb-6">
          Are you sure you want to restore this task?
        </p>
        <div class="flex gap-2 justify-center">
          <button
            class="px-6 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition font-semibold"
          >
            Restore
          </button>
          <button
            class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
            onclick="closeModal('restoreModal')"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>

    <!-- Delete Permanent Modal -->
    <div
      id="deletePermanentModal"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
    >
      <form 
        method="post"
        id="deletePermanentTaskForm" 
        class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
      >
      @csrf
      @method('DELETE')
        <h3 class="text-xl font-bold text-red-400 mb-4">Delete Permanently?</h3>
        <p class="text-gray-300 mb-6">
          Are you sure you want to permanently delete this task? This action cannot be undone.
        </p>
        <div class="flex gap-2 justify-center">
          <button
          type="submit"
            class="px-6 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition font-semibold"
          >
            Delete Permanent
          </button>
          <button
            type="button"
            class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
            onclick="closeModal('deletePermanentModal')"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>
  

<script>
  function openEditModal(id, title, description, categoryId, status, dueDate) {
    document.getElementById('editTaskTitle').value = title;
    document.getElementById('editTaskDesc').value = description;
    document.getElementById('editTaskCategory').value = categoryId;
    document.getElementById('editTaskStatus').value = status;
    document.getElementById('editTaskDue').value = dueDate;
    document.getElementById('editTaskForm').action = 'tasks/' + id;

    openModal('editTaskModal');
  }

  function openDeleteModal(id) {
    document.getElementById('deleteTaskForm').action = 'tasks/' + id;
    openModal('deleteModal');
  }

  function openRestoreModal(id) {
    document.getElementById('restoreTaskForm').action = 'tasks/' + id + '/restore';
    openModal('restoreModal');
  }

  function openDeletePermanentModal(id) {
    document.getElementById('deletePermanentTaskForm').action = 'tasks/' + id + '/force-delete';
    openModal('deletePermanentModal');
  }
</script>
</x-app-layout>
