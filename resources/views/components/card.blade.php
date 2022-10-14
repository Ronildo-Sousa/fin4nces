<div
    {{ $attributes->class(['bg-white','rounded-md', 'p-3', 'font-semibold','w-32', 'sm:w-36', 'sm:h-20', 'flex', 'flex-col', 'items-center', 'justify-center', 'bg-blue-600' => $total]) }}>
    <div class="flex items-center justify-around w-full">
        <p>
            {{ $name }}
        </p>
        <p {{ $attributes->class(['text-'.$type.'-600'])->merge(['class' =>'text-white']) }}>
            {{ $icon }}
        </p>
    </div>
    <div {{ $attributes->class(['text-'.$type.'-600'])->merge(['class' =>'text-white']) }}>
        {{ $slot }}
    </div>
</div>
