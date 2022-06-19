<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Share Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex flex-wrap mx-auto sm:px-6 lg:px-8">
            @foreach ($user->profile->links as $link)

            <div class="flex justify-center lg:mr-4 md:mr-3 mb-4">
                <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
                    <div class="bg-purple-500 flex justify-between rounded-lg align-middle py-3 px-6 border-b border-gray-300 text-white">
                    Template #{{ $link->id }}
                    <span>{{ $link->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">Click to view the template</h5>
                    <p class="text-gray-700 text-base mb-4">
                        {{ Str::limit($link->profile->biographie,70) }}
                    </p>
                    </div>
                    <div class="py-4 px-6 border-t border-gray-300 text-gray-600">
                    <a href="{{ route('profile.links.template',$link->token) }}"
                class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded"> View Template</a>
                    </div>
                </div>
                </div>

            @endforeach
        </div>
    </div>
</x-app-layout>
