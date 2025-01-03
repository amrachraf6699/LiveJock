<x-filament-widgets::widget>
    <x-filament::section>
        <div style="background-color: #fff; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 1.5rem; font-family: Arial, sans-serif;">
            @php
                $about = \App\Models\About::first();
                $locale = app()->getLocale();
                $isRtl = $locale === 'ar';
            @endphp

            <!-- Header Section -->
            <div style="margin-bottom: 1.5rem; text-align: {{ $isRtl ? 'right' : 'left' }};">
                <h2 style="font-size: 1.5rem; font-weight: 600; color: #2d3748;">
                    {{ $locale === 'en' ? 'Website / App Information' : 'معلومات الموقع / التطبيق' }}
                </h2>
                <p style="font-size: 0.875rem; color: #718096;">
                    {{ $locale === 'en' ? 'Last Updated:' : 'آخر تحديث:' }}
                    <span style="color: #2d3748; font-weight: 500;">
                        {{ $about?->updated_at?->format('F j, Y, g:i A') ?? ($locale === 'en' ? 'N/A' : 'غير متوفر') }}
                    </span>
                </p>
            </div>

            @if ($about)
                <!-- Content Section -->
                <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
                    <div style="background-color: #f7fafc; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); text-align: center;">
                        <!-- Logo Section -->
                        <img src="{{ asset('storage/' . $about->logo) }}"
                             alt="{{ $locale === 'en' ? 'Logo' : 'الشعار' }}"
                             style="width: 8rem; height: 8rem; object-fit: contain; border-radius: 0.5rem; margin-bottom: 1rem;">

                        <!-- Social Media Links -->
                        <h3 style="font-size: 1rem; font-weight: 600; color: #2d3748; margin-bottom: 0.5rem;">
                            {{ $locale === 'en' ? 'Social Media' : 'وسائل التواصل الاجتماعي' }}
                        </h3>
                        <div>
                            @foreach (['facebook', 'twitter', 'instagram', 'snapchat', 'youtube'] as $social)
                                @if ($about->$social)
                                    <p style="margin: 0.5rem 0; font-size: 0.875rem; color: #2d3748;">
                                        <span style="font-weight: 600;">{{ $locale === 'en' ? ucfirst($social) : __(':social', ['social' => ucfirst($social)]) }}:</span>
                                        <a href="{{ $about->$social }}" target="_blank" style="text-decoration: underline; color: #3182ce;">
                                            {{ Str::limit($about->$social, 30) }}
                                        </a>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div style="background-color: #f7fafc; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        <h3 style="font-size: 1rem; font-weight: 600; color: #2d3748; margin-bottom: 1rem; text-align: center;">
                            {{ $locale === 'en' ? 'Contact Information' : 'معلومات التواصل' }}
                        </h3>
                        <div>
                            @foreach ([
                                $locale === 'en' ? 'Email' : 'البريد الإلكتروني' => $about->email,
                                $locale === 'en' ? 'Phone' : 'الهاتف' => $about->phone,
                                $locale === 'en' ? 'Website' : 'الموقع الإلكتروني' => $about->website,
                                $locale === 'en' ? 'Channel Frequency' : 'تردد القناة' => $about->channel_frequency,
                            ] as $label => $value)
                                <div style="margin-bottom: 1rem;">
                                    <span style="color: #718096; font-size: 0.875rem;">{{ $label }}:</span>
                                    @if (filter_var($value, FILTER_VALIDATE_URL))
                                        <a href="{{ $value }}" target="_blank" style="display: block; text-decoration: underline; color: #3182ce;">
                                            {{ $value }}
                                        </a>
                                    @else
                                        <span style="display: block; color: #2d3748;">{{ $value }}</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Edit Button Section -->
                <div style="margin-top: 2rem; text-align: center;">
                    <a href="{{ route('filament.manage.resources.abouts.index') }}" style="color: #3182ce; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 0.5rem; background-color: #e2e8f0; transition: background-color 0.2s;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 1.25rem; height: 1.25rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 012.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <span>{{ $locale === 'en' ? 'Edit Information' : 'تعديل المعلومات' }}</span>
                    </a>
                </div>
            @else
                <!-- No Information Available -->
                <div style="margin-top: 2rem; text-align: center;">
                    <p style="color: #718096; font-size: 0.875rem;">
                        {{ $locale === 'en' ? 'No information available.' : 'لا توجد معلومات متوفرة.' }}
                    </p>
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
