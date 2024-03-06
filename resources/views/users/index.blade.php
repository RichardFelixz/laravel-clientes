<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="p-3 bg-gray-100 rounded lg mb-4">
                        {{$users->links()}}
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Nível</th>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">E-mail</th>
                                @can('level')
                                    <th class="text-center">Ações</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="text-center">
                                        @if ($user->level == 'admin')
                                            <i class="fa-solid fa-user-tie"></i>
                                        @else
                                            <i class="fa-solid fa-user text-blue-500"></i>
                                        @endif
                                    </td>
                                    <td class=" px-4 py-2">{{ $user->name }}</td>
                                    <td class=" px-4 py-2">{{ $user->email }}</td>
                                    @can('level')
                                        <td class="text-center">
                                            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

