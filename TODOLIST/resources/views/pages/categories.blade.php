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
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-700">
                      <td class="py-3 px-4">
                        <span
                          class="inline-flex items-center gap-2 px-3 py-1 rounded-xl text-white font-semibold"
                          style="background-color: {{ $category->color ?? 'white' }};"
                          >
                          {!! $category->icon !!} {{ $category->name }}
                        </span>
                      </td>
                      <td class="py-3 px-4 flex gap-2 justify-center">
                        <button
                          class="px-4 py-1 bg-indigo-900 text-indigo-300 rounded-xl hover:bg-indigo-700 transition"
                          onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ $category->color }}', `{{ addslashes($category->icon) }}`)"
                        >
                          Edit
                        </button>
                        <button
                          class="px-4 py-1 bg-red-900 text-red-300 rounded-xl hover:bg-red-700 transition"
                          onclick="openDeleteModal({{ $category->id }}, '{{ addslashes($category->name) }}')"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                @endforeach
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
          <form method="POST" action="{{ route('categories.store') }}" class="space-y-4">
            @csrf
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
                  name="name"
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
                name="color"
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
                name="icon"
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
          <form class="space-y-4" id="editCategoryForm" method="POST" action="">
            @csrf
            @method('PUT')
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
                  name="name"
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
                name="color"
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
                name="icon"
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
        <form action="" method="POST" id="deleteCategoryForm"
          class="bg-gray-800 rounded-2xl shadow-xl p-8 animate-modal w-full max-w-sm text-center"
        >
          @csrf
          @method('DELETE')
          <h3 class="text-xl font-bold text-red-400 mb-4">Delete Category?</h3>
          <p class="text-gray-300 mb-6">
            Are you sure you want to delete this category <span id="deleteCategoryName"></span>?
          </p>
          <div class="flex gap-2 justify-center">
            <button
              type="submit"
              class="px-6 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 transition font-semibold"
            >
              Delete
            </button>
            <button
            type="button"
              class="px-6 py-2 bg-gray-700 text-gray-300 rounded-xl hover:bg-gray-600 transition font-semibold"
              onclick="closeModal('deleteModal')"
            >
              Cancel
            </button>
          </div>
        </form>
      </div>
      <script>
        function openEditModal(id, name, color, icon) {
          document.getElementById('editCategoryName').value = name;
          document.getElementById('editCategoryColor').value = color || '#3682f6';
          document.getElementById('editCategoryIconStr').value = icon || '';
          document.getElementById('editCategoryForm').action = `/categories/${id}`;
          openModal('editCategoryModal');
        }

        function openDeleteModal(id, name) {
          document.getElementById('deleteCategoryName').textContent = name;
          document.getElementById('deleteCategoryForm').action = `/categories/${id}`;
          openModal('deleteModal');
        }
      </script>
</x-app-layout>
