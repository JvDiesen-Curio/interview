<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>

    <div class=" w-full flex justify-center  p-5 ">
        <form class="w-1/5 bg-gray-600 rounded-lg shadow-lg p-5 " action="{{ route('role.update', $role) }}"
            method="POST">
            @csrf
            @method('PUT')
            <x-input name='name' type='text' label='Name' value="{{ old('name', $role->name) }}">
            </x-input>

            @foreach ($permissions as $permissinon)
                <div class="flex my-5 justify-between ">
                    <label class="text-white uppercase font-mono"
                        for="{{ $permissinon->name }}">{{ $permissinon->name }}</label>
                    <input {{ $permissinon->set ? 'checked' : '' }} type="checkbox" name="{{ $permissinon->name }}"
                        id="{{ $permissinon->name }}">
                </div>
            @endforeach


            <input class=" w-full uppercase bg-black rounded-lg text-white  font-extrabold p-1 mt-4 " type="submit"
                value="SAVE">
        </form>
    </div>
</x-app-layout>
