@props([
    'items' => []
])

<div class="px-4 sm:px-6 lg:px-8">
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <x-th label="Name" />
                                <x-th label="Title" />
                                <x-th label="Email" />
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($items as $item)
                                <tr>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $item->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $item->email }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $item->email_verified_at }}
                                    </td>
                                </tr>
                            @endforeach
                            
                            <!-- More people... -->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
