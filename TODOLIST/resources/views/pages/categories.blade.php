<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between flex-wrap items-center gap-4">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
        <button
              class="px-6 py-2 bg-indigo-600 text-white rounded-xl shadow-lg hover:bg-indigo-700 transition font-semibold"
              onclick="openModal('addCategoryModal')"
            >
              + Add Category
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <div class="bg-gray-800 shadow-lg overflow-x-auto">
            <table class="min-w-full text-sm shadow-lg">
              <thead>
                <tr class="bg-gray-900">
                  <th class="py-3 px-4 text-left font-semibold text-gray-300">
                    Name
                  </th>
                  <th class="py-3 px-4 text-center font-semibold text-gray-300">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-gray-700">
                  <td class="py-3 px-4">
                    <span
                      class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-indigo-900 text-indigo-300 font-semibold"
                    >
                      💪 Work
                    </span>
                  </td>
                  <td class="py-3 px-4 flex gap-2 justify-center">
                    <button
                      class="px-4 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition"
                      onclick="openModal('editCategoryModal')"
                    >
                      Edit
                    </button>
                    <button
                      class="px-4 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition"
                      onclick="openModal('deleteModal')"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
                <tr class="border-b border-gray-700">
                  <td class="py-3 px-4">
                    <span
                      class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-pink-900 text-pink-300 font-semibold"
                    >
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
                          d="M12 4v16m8-8H4"
                        />
                      </svg>
                      Personal
                    </span>
                  </td>
                  <td class="py-3 px-4 flex gap-2 justify-center">
                    <button
                      class="px-4 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition"
                      onclick="openModal('editCategoryModal')"
                    >
                      Edit
                    </button>
                    <button
                      class="px-4 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition"
                      onclick="openModal('deleteModal')"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
                <tr>
                  <td class="py-3 px-4">
                    <span
                      class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-yellow-900 text-yellow-300 font-semibold"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <circle
                          cx="12"
                          cy="12"
                          r="10"
                          stroke="currentColor"
                          stroke-width="2"
                          fill="none"
                        />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 12h8"
                        />
                      </svg>
                      Shopping
                    </span>
                  </td>
                  <td class="py-3 px-4 flex gap-2 justify-center">
                    <button
                      class="px-4 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition"
                      onclick="openModal('editCategoryModal')"
                    >
                      Edit
                    </button>
                    <button
                      class="px-4 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition"
                      onclick="openModal('deleteModal')"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
    </div>
    
      <!-- Add Category Modal -->
      <div
        id="addCategoryModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
      >
        <div
          class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
        >
          <h3 class="text-xl font-bold text-indigo-400 mb-4">Add Category</h3>
          <form class="space-y-4">
            <div class="text-left space-y-2">
              <label
                for="addCategoryName"
                class="block text-sm font-medium text-gray-300 mb-1"
                >Category Name</label
              >
              <div class="flex flex-col gap-2">
                <input
                  id="addCategoryName"
                  type="text"
                  placeholder="Category Name"
                  class="w-full px-4 py-2 rounded-xl border-2 border-indigo-500 bg-gray-950 text-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition placeholder:text-indigo-400 focus:bg-gray-900"
                />
              </div>
              <label
                for="addCategoryColor"
                class="block text-sm font-medium text-gray-300 mb-1"
                >Background Color</label
              >
              <input
                id="addCategoryColor"
                type="color"
                value="#3682f6"
                class="w-full h-10 rounded-xl border-2 border-indigo-500 bg-gray-950 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition"
                style="padding: 0.15rem"
              />
              <label
                for="addCategoryIconStr"
                class="block text-sm font-medium text-gray-300 mb-1"
                >Icon (SVG or Emoji)</label
              >
              <textarea
                id="addCategoryIconStr"
                placeholder="Paste SVG code or type emoji (e.g. 💼)"
                rows="2"
                class="w-full px-4 py-2 rounded-xl border-2 border-indigo-500 bg-gray-950 text-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition placeholder:text-indigo-400 focus:bg-gray-900 resize-none"
              ></textarea>
            </div>
            <div class="flex gap-2 justify-center">
              <button
                type="submit"
                class="px-6 py-2 bg-emerald-600 text-white rounded-xl shadow-lg hover:bg-emerald-700 transition font-semibold"
              >
                Add
              </button>
              <button
                type="button"
                class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
                onclick="closeModal('addCategoryModal')"
              >
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Edit Category Modal -->
      <div
        id="editCategoryModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
      >
        <div
          class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
        >
          <h3 class="text-xl font-bold text-indigo-400 mb-4">Edit Category</h3>
          <form class="space-y-4">
            <div class="text-left space-y-2">
              <label
                for="editCategoryName"
                class="block text-sm font-medium text-gray-300 mb-1"
                >Category Name</label
              >
              <div class="flex flex-col gap-2">
                <input
                  id="editCategoryName"
                  type="text"
                  placeholder="Category Name"
                  class="w-full px-4 py-2 rounded-xl border-2 border-indigo-500 bg-gray-950 text-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition placeholder:text-indigo-400 focus:bg-gray-900"
                />
              </div>
              <label
                for="editCategoryColor"
                class="block text-sm font-medium text-gray-300 mb-1"
                >Background Color</label
              >
              <input
                id="editCategoryColor"
                type="color"
                value="#3682f6"
                class="w-full h-10 rounded-xl border-2 border-indigo-500 bg-gray-950 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition"
                style="padding: 0.15rem"
              />
              <label
                for="editCategoryIconStr"
                class="block text-sm font-medium text-gray-300 mb-1"
                >Icon (SVG or Emoji)</label
              >
              <textarea
                id="editCategoryIconStr"
                placeholder="Paste SVG code or type emoji (e.g. 💼)"
                rows="2"
                class="w-full px-4 py-2 rounded-xl border-2 border-indigo-500 bg-gray-950 text-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm transition placeholder:text-indigo-400 focus:bg-gray-900 resize-none"
              ></textarea>
            </div>
            <div class="flex gap-2 justify-center">
              <button
                type="submit"
                class="px-6 py-2 bg-indigo-600 text-white rounded-xl shadow-lg hover:bg-indigo-700 transition font-semibold"
              >
                Save
              </button>
              <button
                type="button"
                class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
                onclick="closeModal('editCategoryModal')"
              >
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>

      <div
        id="deleteModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"
      >
        <div
          class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
        >
          <h3 class="text-xl font-bold text-red-400 mb-4">Delete Category?</h3>
          <p class="text-gray-300 mb-6" id="deleteCategoryName">
            Are you sure you want to delete this category?
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
