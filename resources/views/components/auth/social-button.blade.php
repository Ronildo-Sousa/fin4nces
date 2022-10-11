@props(['provider'])
<div class="p-2 px-4 text-center bg-gray-300 rounded-md cursor-pointer w-25 min-w-25 max-w-25 max-h-10 hover:bg-gray-400">
    <a class="text-lg"
        href="{{ route('Authsocial', ['provider' => $provider]) }}">
        {{ $slot }}
    </a>
</div>
