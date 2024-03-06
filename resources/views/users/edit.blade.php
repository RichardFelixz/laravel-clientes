<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Editando nível de acesso <strong>{{ $user->name }}</strong> </p>
                </div>

                <div class="p-6 text-gray-900">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="level">Selecione o nível</label>
                        <select name="level" required class="py-1 px-8 rounded">
                            <option value="">Selecione</option>
                            <option value="user" {{ $user->level == 'user' ? 'selected' : '' }}>Usuário Comum</option>
                            <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                        <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4">
                            <i class="fa-regular fa-floppy-disk mr-2"></i>
                            Salvar Alterações
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
