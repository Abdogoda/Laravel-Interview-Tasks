<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap items-center gap-4">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
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
                      <option value="all">Status: All</option>
                      <option value="completed">Completed</option>
                      <option value="pending">Pending</option>
                      <option value="overdue">Overdue</option>
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
                      <option value="all">Category: All</option>
                      <option value="work">Work</option>
                      <option value="personal">Personal</option>
                      <option value="shopping">Shopping</option>
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
                      name="sort"
                      class="pl-10 pr-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    >
                      <option value="">Sort by...</option>
                      <option value="due_asc">Due Date ↑</option>
                      <option value="due_desc">Due Date ↓</option>
                      <option value="status_asc">Status ↑</option>
                      <option value="status_desc">Status ↓</option>
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
                    <tr class="border-b border-gray-700">
                      <td class="py-3 px-4 text-white">Finish project</td>
                      <td class="py-3 px-4 truncate max-w-xs text-gray-400">
                        Complete the frontend and backend for the todo list app.
                      </td>
                      <td class="py-3 px-4 text-white">Work</td>
                      <td class="py-3 px-4 text-white">2025-09-10</td>
                      <td class="py-3 px-4">
                        <span
                          class="px-3 py-1 rounded-xl bg-emerald-900 text-emerald-300 font-semibold"
                          >Completed</span
                        >
                      </td>
                      <td class="py-3 px-4 flex gap-2">
                        <button
                          class="px-3 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition editTaskBtn"
                          onclick="openModal('editTaskModal')"
                        >
                          Edit
                        </button>
                        <button
                          class="px-3 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition deleteTaskBtn"
                          onclick="openModal('deleteModal')"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                    <tr class="border-b border-gray-700">
                      <td class="py-3 px-4 text-white">Buy groceries</td>
                      <td class="py-3 px-4 truncate max-w-xs text-gray-400">
                        Milk, eggs, bread, and fruits.
                      </td>
                      <td class="py-3 px-4 text-white">Shopping</td>
                      <td class="py-3 px-4 text-white">2025-09-06</td>
                      <td class="py-3 px-4">
                        <span
                          class="px-3 py-1 rounded-xl bg-yellow-900 text-yellow-300 font-semibold"
                          >Pending</span
                        >
                      </td>
                      <td class="py-3 px-4 flex gap-2">
                        <button
                          class="px-3 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition editTaskBtn"
                          onclick="openModal('editTaskModal')"
                        >
                          Edit
                        </button>
                        <button
                          class="px-3 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition deleteTaskBtn"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td class="py-3 px-4 text-white">Pay bills</td>
                      <td class="py-3 px-4 truncate max-w-xs text-gray-400">
                        Electricity and internet bills for September.
                      </td>
                      <td class="py-3 px-4 text-white">Personal</td>
                      <td class="py-3 px-4 text-white">2025-09-05</td>
                      <td class="py-3 px-4">
                        <span
                          class="px-3 py-1 rounded-xl bg-red-900 text-red-300 font-semibold"
                          >Overdue</span
                        >
                      </td>
                      <td class="py-3 px-4 flex gap-2">
                        <button
                          class="px-3 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition editTaskBtn"
                          onclick="openModal('editTaskModal')"
                        >
                          Edit
                        </button>
                        <button
                          class="px-3 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition deleteTaskBtn"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="flex justify-end items-center gap-2 p-4">
                  <button
                    class="px-3 py-1 rounded-xl bg-gray-900 text-gray-400 hover:bg-gray-800 transition"
                  >
                    Prev
                  </button>
                  <span class="px-3 py-1 rounded-xl bg-gray-900 text-indigo-300"
                    >1</span
                  >
                  <button
                    class="px-3 py-1 rounded-xl bg-gray-900 text-gray-400 hover:bg-gray-800 transition"
                  >
                    Next
                  </button>
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
        <form class="space-y-4">
          <div class="text-left">
            <label
              for="addTaskTitle"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Title</label
            >
            <input
              id="addTaskTitle"
              type="text"
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
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              <option>Work</option>
              <option>Personal</option>
              <option>Shopping</option>
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
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              <option>Completed</option>
              <option>Pending</option>
              <option>Overdue</option>
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
              type="date"
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
        <form class="space-y-4">
          <div class="text-left">
            <label
              for="editTaskTitle"
              class="block text-sm font-medium text-gray-300 mb-1"
              >Title</label
            >
            <input
              id="editTaskTitle"
              type="text"
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
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              <option>Work</option>
              <option>Personal</option>
              <option>Shopping</option>
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
              class="w-full px-4 py-2 rounded-xl border border-gray-700 bg-gray-900 text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >
              <option>Completed</option>
              <option>Pending</option>
              <option>Overdue</option>
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
              type="date"
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
      <div
        class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
      >
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
      </div>
    </div>
</x-app-layout>
