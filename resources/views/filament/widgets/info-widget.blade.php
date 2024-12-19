<x-filament-widgets::widget>
    <x-filament::section>
        <div class="bg-white p-8 rounded-lg shadow-lg space-y-6">
            @php
                $about = \App\Models\About::first();
            @endphp

            <!-- Header Section -->
            <div class="mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Website / App Information</h2>
                <p class="text-sm text-gray-500">
                    Last Updated:
                    <span class="text-gray-700 font-medium">
                        {{ $about?->updated_at?->format('F j, Y, g:i A') ?? 'N/A' }}
                    </span>
                </p>
            </div>

            @if ($about)
                <!-- Content Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex flex-col items-center md:items-start bg-gray-100 p-6 rounded-lg shadow-md space-y-4 justify-center content-center">
                        <!-- Logo Section -->
                        <img src="{{ asset('storage/' . $about->logo) }}"
                             alt="Logo"
                             class="w-32 h-32 object-contain rounded-md mb-6 shadow-md mx-auto">

                        <!-- Social Media Links -->
                        <div class="w-full text-center">
                            <h3 class="text-lg font-semibold text-gray-700">Social Media</h3>
                            <div class="mt-4 text-center">
                                @foreach (['facebook', 'twitter', 'instagram', 'snapchat', 'youtube'] as $social)
                                    @if ($about->$social)
                                        <p class="inline-block mx-2 p-2">
                                            <span class="font-medium text-gray-800">{{ ucfirst($social) }}:</span>
                                            <a href="{{ $about->$social }}" target="_blank" class="underline hover:underline">
                                                {{ Str::limit($about->$social, 30) }}
                                            </a>
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <!-- Contact Information Section -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md space-y-4">
                        <h3 class="text-lg font-semibold text-gray-700 text-center">Contact Information</h3>
                        <div class="space-y-4">
                            @foreach ([
                                'Email' => $about->email,
                                'Phone' => $about->phone,
                                'Website' => $about->website,
                                'Channel Frequency' => $about->channel_frequency,
                            ] as $label => $value)
                                <div class="flex flex-col">
                                    <span class="text-gray-600">{{ $label }}:</span>
                                    @if (filter_var($value, FILTER_VALIDATE_URL))
                                        <a href="{{ $value }}" target="_blank" class="underline text-blue-600 hover:underline">
                                            {{ $value }}
                                        </a>
                                    @else
                                        <span class="text-gray-800">{{ $value }}</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Edit Button Section -->
                <div class="mt-6 flex justify-center text-red-400 mb-4">
                    <a href="{{ route('filament.manage.resources.abouts.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center space-x-2 py-2 px-4 rounded-lg shadow-md hover:bg-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <span>Edit Information</span>
                    </a>
                </div>
            @else
                <!-- No Information Available -->
                <div class="mt-8 text-center">
                    <p class="text-gray-500">No information available.</p>
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
