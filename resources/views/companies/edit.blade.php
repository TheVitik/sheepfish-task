<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('companies.update',$company) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div>
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="$company->name" required autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                          :value="$company->email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="website" :value="__('Website')"/>
                            <x-text-input id="website" class="block mt-1 w-full" type="url" name="website"
                                          :value="$company->website" />
                            <x-input-error :messages="$errors->get('website')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="logo" :value="__('Logo')"/>
                            <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo"/>
                            <x-input-error :messages="$errors->get('logo')" class="mt-2"/>
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}"
                                     alt="{{ $company->name }}" class="h-10 w-10 rounded-full"/>
                            @endif
                        </div>
                        <div class="mt-6">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                                {{ __('Save Company') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
