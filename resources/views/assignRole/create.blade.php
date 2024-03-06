<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role and user') }}
        </h2>
    </x-slot>

    <div class=" w-full flex justify-center  p-5 ">
        <form class="w-1/5 bg-gray-600 text-white  rounded-lg shadow-lg p-5 " action="{{ route('assignRole.store') }}"
            method="POST">
            @csrf
            <div class=" flex ">
                <div>
                    <label for="user">User</label>
                    <select name="userId" id="user" class=" text-black">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" text-red-500 mx-3 text-xl font-extrabold">-></div>
                <div>
                    <label for="role">Role</label>
                    <select name="roleId" id="role" class=" text-black">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input class=" w-full uppercase bg-black rounded-lg  font-extrabold p-1 mt-4 " type="submit"
                value="SAVE">
        </form>
    </div>
</x-app-layout>
