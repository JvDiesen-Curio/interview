@props(['team' => null, 'disable' => false])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $team ? 'Team: ' . $team->id : 'New Team' }}
        </h2>
    </x-slot>

    <section>
        <article>
            <main>
                <form method="POST" action="{{ $team ? route('team.update', $team) : route('team.store') }}">
                    @csrf
                    @method($team ? 'put' : 'post')
                    <x-input name='name' type='text' label='Name'
                        value="{{ $team ? old('name', $team->name) : '' }}"></x-input>
                    <x-input name='projectName' type='text' label='Project name'
                        value="{{ old('projectName') }}"></x-input>


                    <input class=" text-gray-400" type="submit" value="{{ $team ? 'Update' : 'Save' }}">
                </form>
            </main>
        </article>
    </section>
</x-app-layout>
