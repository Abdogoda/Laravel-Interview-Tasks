<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-8 mb-8">
            <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 text-white rounded-2xl shadow-xl p-8 flex flex-col items-center group hover:scale-105 transition-transform duration-200">
                <div class="text-4xl font-extrabold mb-2">{{ $totalTasks ?? 0 }}</div>
                <div class="text-lg font-medium opacity-90">Total Tasks</div>
            </div>
            <div class="bg-gradient-to-br from-emerald-400 to-emerald-600 text-white rounded-2xl shadow-xl p-8 flex flex-col items-center group hover:scale-105 transition-transform duration-200">
                <div class="text-4xl font-extrabold mb-2">{{ $completedTasks ?? 0 }}</div>
                <div class="text-lg font-medium opacity-90">Completed Tasks</div>
            </div>
            <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 text-white rounded-2xl shadow-xl p-8 flex flex-col items-center group hover:scale-105 transition-transform duration-200">
                <div class="text-4xl font-extrabold mb-2">{{ $pendingTasks ?? 0 }}</div>
                <div class="text-lg font-medium opacity-90">Pending Tasks</div>
            </div>
            <div class="bg-gradient-to-br from-red-400 to-red-600 text-white rounded-2xl shadow-xl p-8 flex flex-col items-center group hover:scale-105 transition-transform duration-200">
                <div class="text-4xl font-extrabold mb-2">{{ $overdueTasks ?? 0 }}</div>
                <div class="text-lg font-medium opacity-90">Overdue Tasks</div>
            </div>
            <div class="bg-gradient-to-br from-gray-700 to-gray-900 text-white rounded-2xl shadow-xl p-8 flex flex-col items-center group hover:scale-105 transition-transform duration-200">
                <div class="text-4xl font-extrabold mb-2">{{ $totalCategories ?? 0 }}</div>
                <div class="text-lg font-medium opacity-90">Total Categories</div>
            </div>
        </div>
    </div>
</x-app-layout>
