<section>
    <div class="flex flex-col items-stretch p-3 bg-gray-700" method="POST">
        <h3 class="text-lg text-white">Create a new finance</h3>
        @if (session()->has('error'))
            <div class="flex justify-center">
                <span class="text-center text-red-400">{{ session('error') }}</span>
            </div>
        @endif
        <div class="">
            <div class="p-2">
                <label for="description" class="sr-only">Description</label>
                <input wire:model='description' id="description" name="description" type="text"
                    class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                    placeholder="Description">
                @error('description')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex">
                <div class="p-2">
                    <label for="date" class="sr-only">Date</label>
                    <input wire:model='date' id="date" name="date" type="date"
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Date">
                    @error('date')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="p-2">
                    <select wire:model='finance_type'
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-sm focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        @foreach ($financeTypes as $financeType)
                            <option name="finance_type" selected value="{{ $financeType->id }}">{{ $financeType->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2">
                    <label for="amount" class="sr-only">Amount</label>
                    <input x-mask:dynamic="$money($input, ',')" wire:model='amount' id="amount" name="amount"
                        type="number" min="0.1" max="100" step=".01"
                        class="relative block w-full px-3 py-2 text-black placeholder-gray-500 border border-gray-300 rounded-sm appearance-none focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Amount">
                    @error('amount')
                        <span class="text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end p-2">
                <button wire:click="$emit('closeModal')"
                    class="p-1 px-3 mr-4 bg-gray-200 rounded-sm hover:bg-gray-300">Cancel</button>
                <button wire:click='save'
                    class="p-1 px-3 text-white bg-green-600 rounded-sm hover:bg-green-700">Create</button>
            </div>
        </div>
    </div>
</section>
