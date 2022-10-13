<section class="bg-white p-3 rounded-lg mt-4 md:p-4 max-w-3xl w-full">
    <div>
        <div class="text-lg font-semibold mb-2">
            <p>{{ $finance->description }}</p>
        </div>
        <div class="flex justify-between">
            @if ($finance->finance_type == 1)
                <p class="font-bold text-red-500">R${{ $finance->amount }}</p>
            @else
                <p class="font-bold text-green-500">R${{ $finance->amount }}</p>
            @endif
            <p class="font-semibold">{{ $finance->date }}</p>
            <livewire:finances.destroy :finance="$finance" />
        </div>
    </div>
</section>
