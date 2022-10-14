<main class="overflow-hidden">
    <div class="bg-red-50">
        <livewire:pages.side-bar />
    </div>
    <div class="static bg-green-700 h-20">
        <div class="absolute flex w-full lg:w-2/3 lg:left-40 xl:w-1/2 xl:left-1/4 justify-around top-8">
            <div>
                <x-card type="red" :total="false">
                    <x-slot:name>
                        Expenses
                        </x-slot>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            </x-slot>
                            <p>R$ 100,00</p>
                </x-card>


            </div>
            <div>
                <x-card type="green" :total="false">
                    <x-slot:name>
                        Incomings
                        </x-slot>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            </x-slot>
                            <p>R$ 100,00</p>
                </x-card>
            </div>
            <div>
                <x-card type :total="true">
                    <x-slot:name>
                        Total
                        </x-slot>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            </x-slot>
                            <p>R$ 100,00</p>
                </x-card>
            </div>
        </div>
    </div>
    <button wire:click="$emit('openModal', 'finances.create')"
        class="fixed bottom-5 right-5 bg-green-600 text-white hover:bg-green-700 p-1 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-8 h-8 font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </button>
    <div class="p-1 mt-10 mb-14 md:p-5 flex flex-col items-center">
        @foreach ($finances as $finance)
            <livewire:pages.list-item wire:key="'list-item-'.$finance->id" :finance="$finance" />
        @endforeach

        <div class="mt-5">
            {{ $finances->links() }}
        </div>
    </div>
</main>
