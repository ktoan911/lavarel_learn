<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('User list') }}
                </div>
            </div>
            <x-primary-button class="mt-4">
                {{ __('Create') }}
            </x-primary-button>
            {{-- N+1 redundancy --}}
            {{-- Lazy coding khi laravel chỉ lấy ra những thứ cần dẫn đến việc nếu không báo trước cho nó cần các trường gì nó sẽ load 
            thiếu và mất công load lại câu truy vấn khi gặp trường không có --}}
            {{-- -> sửa trong controller để lấy ra các trường cần thiết --}}
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-gray-900 dark:text-gray-100" scope="col">ID</th>
                        <th class="text-gray-900 dark:text-gray-100" scope="col">Name</th>
                        <th class="text-gray-900 dark:text-gray-100" scope="col">Username</th>
                        <th class="text-gray-900 dark:text-gray-100" scope="col">Tasks</th>
                        <th class="text-gray-900 dark:text-gray-100" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td class="text-gray-900 dark:text-gray-100" scope='row'>{{ $index }}</td>
                            <td class="text-gray-900 dark:text-gray-100">{{ $user->fullname }}</td>
                            <td class="text-gray-900 dark:text-gray-100">{{ $user->username }}</td>
                            <td class="text-gray-900 dark:text-gray-100">
                                @foreach ($user->tasks as $task)
                                    {{ $task->name }} 
                                @endforeach
                            </td>
                            <td class="text-gray-900 dark:text-gray-100">
                                <a href="/user/{{ $user->id }}/edit">
                                    <x-primary-button class="mt-4">
                                        {{ __('Edit') }}
                                    </x-primary-button>
                                </a>
                                <x-primary-button class="mt-4">
                                    {{ __('Delete') }}
                                </x-primary-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</x-app-layout>
