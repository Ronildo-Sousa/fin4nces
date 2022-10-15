<main>
    <x-nav-bar :monthExpenses="$monthExpenses" :monthIncomings="$monthIncomings" :monthTotal="$monthTotal" />

    <div class="mt-10">
        <div class="p-1 mt-10 mb-14 md:p-5 flex flex-col items-center">
            <div>
                <select wire:model.defer='currentMonth' name="currentMonth">
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
                <input wire:model.lazy='currentYear' type="datetime" name="currentYear">
                <button wire:click='search'>Search</button>
            </div>
            @foreach ($finances as $finance)
                <x-list-item wire:key="'list-item-'.$finance['id']" :finance="$finance" :description="$finance['description']" :finance_type="$finance['finance_type']"
                    :amount="$finance['amount']" :date="$finance['date']" />
            @endforeach
        </div>
    </div>
</main>
