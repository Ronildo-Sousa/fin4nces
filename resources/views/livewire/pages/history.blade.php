<main>
    <x-nav-bar :monthExpenses="$monthExpenses" :monthIncomings="$monthIncomings" :monthTotal="$monthTotal" />

    <div class="mt-10">
        <div class="p-1 mt-10 mb-14 md:p-5 flex flex-col items-center">
            <div class="flex w-full sm:w-2/3 md:w-3/5 lg:w-1/2 justify-around mt-5 mx-auto">
                <select wire:model.defer='currentMonth' class="w-1/3 rounded-sm" name="currentMonth">
                    <option value="{{ 1 }}">January</option>
                    <option value="{{ 2 }}">February</option>
                    <option value="{{ 3 }}">March</option>
                    <option value="{{ 4 }}">April</option>
                    <option value="{{ 5 }}">May</option>
                    <option value="{{ 6 }}">June</option>
                    <option value="{{ 7 }}">July</option>
                    <option value="{{ 8 }}">August</option>
                    <option value="{{ 9 }}">September</option>
                    <option value="{{ 10 }}">October</option>
                    <option value="{{ 11 }}">November</option>
                    <option value="{{ 12 }}">December</option>
                </select>
                <input wire:model.lazy='currentYear' type="datetime" class="w-1/4 rounded-sm text-center"
                    name="currentYear">
                <button wire:click='search'
                    class="bg-green-600 text-white p-1 px-2 rounded-sm text-center hover:bg-green-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>
            
            @foreach ($finances as $finance)
                <x-list-item :description="$finance['description']" :finance_type="$finance['finance_type']" :amount="$finance['amount']" :date="$finance['date']">
                    <button wire:click="destroy({{$finance['id']}})" class="bg-red-500 text-white p-1 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </x-list-item>
            @endforeach
            @if (empty($finances))
                <div
                    class="mt-5 w-full bg-red-500 text-white text-center cursor-pointer hover:bg-red-600 p-2 rounded-sm">
                    <p>No data was found.</p>
                </div>
            @endif
        </div>
    </div>
</main>
