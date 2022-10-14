<main>
    <x-nav-bar :monthExpenses="$monthExpenses" :monthIncomings="$monthIncomings" :monthTotal="$monthTotal" />

    <div class="mt-10">
        <select name="months">
            @foreach ($months as $month)
                <option value="{{ $month['id']}}">{{ $month['name']}}</option>
            @endforeach
        </select>
    </div>
</main>
