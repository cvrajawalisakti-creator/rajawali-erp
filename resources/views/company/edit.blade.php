<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company Profile
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                <form method="POST" action="{{ route('company.update') }}">

                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="company_name" value="Company Name" />

                        <x-text-input
                            id="company_name"
                            name="company_name"
                            type="text"
                            class="mt-1 block w-full"
                            :value="old('company_name', $company->company_name)"
                        />

                        <x-input-error
                            :messages="$errors->get('company_name')"
                            class="mt-2"
                        />
                    </div>

                    <div class="mt-6">
                        <x-primary-button>
                            Save Company
                        </x-primary-button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>