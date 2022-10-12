<div>
    <button wire:click="$emit('openModal', 'finances.create')">Edit User</button>
    @foreach ($finances as $finance)
        <p class="text-white">{{ $finance }}</p>
    @endforeach
</div>
