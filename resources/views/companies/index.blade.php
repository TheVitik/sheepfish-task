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
                    <div class="flex justify-between mb-4">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Company List') }}
                        </h2>
                        <a href="{{ route('companies.create') }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Create') }}
                        </a>
                    </div>
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">{{ __('ID') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Logo') }}</th>
                                <th class="py-3 px-6 text-left">{{ __('Name') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Email') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Website') }}</th>
                                <th class="py-3 px-6 text-center">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($companies as $company)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $company->id }}</td>
                                    <td class="py-3 px-6 text-center">
                                        @if ($company->logo)
                                            <img src="{{ asset('storage/' . $company->logo) }}"
                                                 alt="{{ $company->name }}" class="h-10 w-10 rounded-full"/>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $company->name }}</td>
                                    <td class="py-3 px-6 text-center">{{ $company->email }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="{{ route('companies.edit',$company) }}"
                                           class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                        <form action="{{ route('companies.destroy', $company) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-900">{{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
