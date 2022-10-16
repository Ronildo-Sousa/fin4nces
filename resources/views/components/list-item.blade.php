<div class="bg-white p-3 rounded-lg mt-4 md:p-4 max-w-3xl w-full">
    <div>
        <div class="text-lg font-semibold mb-2">
            <p>{{ $description }}</p>
        </div>
        <div class="flex justify-between">
            @if ($financeType == 1)
                <p class="font-bold text-red-500">R${{ $amount }}</p>
            @else
                <p class="font-bold text-green-500">R${{ $amount }}</p>
            @endif
            <p class="font-semibold">{{ $date }}</p>
         
            <livewire:finances.destroy wire:key="delete-$financeId" :financeId="$financeId" />
        </div>
    </div>
</div>
