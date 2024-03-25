<div>
    <form>
        <div>
            <label class="text-white" for="description">Description</label>
            <input id="description" type="text" wire:model='form.description'>
        </div>
        <div>
            <label class="text-white" for="date">Date</label>
            <input id="date" type="date" wire:model.live='form.date'>
        </div>
        <div>
            <label class="text-white" for="project_id">Project</label>
            <select name="project_id" id="project_id" wire:model.live='form.project_id'>
                <option></option>
                @foreach ($projects as $project)
                    <option @selected($project->id === $form->project_id) value="{{ $project->id }}">{{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>


            @foreach ($questions as $question)
                {{-- <livewire:questionform mod:question="$question" :key='$loop->index'> --}}
                <div>
                    <label class="text-white" for="description">Description</label>
                    <input id="description" type="text" wire:model="$question">
                </div>
            @endforeach

        </div>
    </form>
    <button class=" bg-red-600 font-extrabold w-full" wire:click="addQuestion()">+</button>
    <input class="w-full bg-black text-white" type="submit" value="Save" wire:click="save()">

    </main>
</div>
