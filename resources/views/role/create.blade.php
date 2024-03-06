<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>

    <div class=" w-full flex justify-center  p-5 ">
        <form class="w-1/5 bg-gray-600 rounded-lg shadow-lg p-5 " action="{{ route('role.store') }}" method="POST">
            @csrf
            <x-input name='name' type='text' label='Name' value="{{ old('name') }}">
            </x-input>
            <input class=" w-full uppercase bg-black rounded-lg text-white  font-extrabold p-1 mt-4 " type="submit"
                value="SAVE">
        </form>
    </div>
</x-app-layout>
