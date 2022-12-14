<main class="overflow-hidden">

    <x-nav-bar :monthExpenses="$monthExpenses" :monthIncomings="$monthIncomings" :monthTotal="$monthTotal" />

    <button wire:click="$emit('openModal', 'finances.create')"
        class="fixed bottom-5 right-5 bg-green-600 text-white hover:bg-green-700 p-1 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-8 h-8 font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </button>
    <div class="p-1 mt-10 mb-14 md:p-5 flex flex-col items-center">
        @foreach ($finances as $finance)
            <x-list-item :description="$finance->description" :finance_type="$finance->finance_type" :amount="$finance->amount" :date="$finance->date">
                <livewire:finances.destroy :financeId="$finance['id']">
            </x-list-item>
        @endforeach

        @if ($finances->count() == 0)
            <div class="mt-5 w-full md:w-2/3 bg-red-500 text-white text-center cursor-pointer hover:bg-red-600 p-2 rounded-sm">
                <p>No data was found.</p>
            </div>
        @endif

        <div class="mt-5">
            {{ $finances->links() }}
        </div>
    </div>
</main>
