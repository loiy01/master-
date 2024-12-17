<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <!-- Left section (Profile Info) -->
                    <div class="md:w-1/3 p-6 bg-gradient-to-br from-blue-500 to-teal-400 text-white text-center">
                        <div class="rounded-full overflow-hidden w-32 h-32 mx-auto mb-4">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-semibold">{{ Auth::user()->name }}</h3>
                        <p class="mt-2 text-sm">{{ Auth::user()->email }}</p>
                    </div>

                    <!-- Right section (Details) -->
                    <div class="md:w-2/3 p-6">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Personal Details') }}</h3>
                        
                        <div class="space-y-4">
                            <!-- Display Phone -->
                            <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm">
                                <span class="text-gray-700 font-medium">{{ __('Phone') }}</span>
                                <span class="text-gray-600">{{ Auth::user()->phone ?? 'Not provided' }}</span>
                            </div>

                            <!-- Display Address -->
                            <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg shadow-sm">
                                <span class="text-gray-700 font-medium">{{ __('Address') }}</span>
                                <span class="text-gray-600">{{ Auth::user()->address ?? 'Not provided' }}</span>
                            </div>

                            <!-- Edit Profile Link -->
                            <div class="mt-6 text-right">
                                <a href="{{ route('profile.edit') }}">
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                        {{ __('Edit Profile') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
