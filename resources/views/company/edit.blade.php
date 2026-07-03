<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company Profile
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 rounded-lg border border-green-300 bg-green-100 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-8">

                <form method="POST" action="{{ route('company.update') }}">

                    @csrf
                    @method('PUT')

                    <h3 class="text-lg font-semibold border-b pb-3 mb-6">
                        General Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <x-input-label
                                for="company_name"
                                value="Company Name *" />

                            <x-text-input
                                id="company_name"
                                name="company_name"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('company_name', $company->company_name)" />

                            <x-input-error
                                :messages="$errors->get('company_name')"
                                class="mt-2" />
                        </div>

                        <div>
                            <x-input-label
                                for="company_short_name"
                                value="Short Name" />

                            <x-text-input
                                id="company_short_name"
                                name="company_short_name"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('company_short_name', $company->company_short_name)" />
                        </div>

                    </div>

                    <div class="mt-6">

                        <label class="inline-flex items-center">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                @checked($company->is_active)
                                class="rounded border-gray-300">

                            <span class="ml-2">

                                Company Active

                            </span>

                        </label>

                    </div>

                    <hr class="my-8">

                    <h3 class="text-lg font-semibold mb-6">
                        Contact Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2">

                            <x-input-label
                                for="address"
                                value="Address" />

                            <textarea
                                id="address"
                                name="address"
                                rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('address', $company->address) }}</textarea>

                        </div>

                        <div>

                            <x-input-label
                                for="phone"
                                value="Phone" />

                            <x-text-input
                                id="phone"
                                name="phone"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('phone', $company->phone)" />

                        </div>

                        <div>

                            <x-input-label
                                for="email"
                                value="Email" />

                            <x-text-input
                                id="email"
                                name="email"
                                type="email"
                                class="block mt-1 w-full"
                                :value="old('email', $company->email)" />

                        </div>

                        <div class="md:col-span-2">

                            <x-input-label
                                for="website"
                                value="Website" />

                            <x-text-input
                                id="website"
                                name="website"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('website', $company->website)" />

                        </div>

                    </div>

                    <hr class="my-8">

                    <h3 class="text-lg font-semibold mb-6">
                        Legal Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <x-input-label
                                for="npwp"
                                value="NPWP" />

                            <x-text-input
                                id="npwp"
                                name="npwp"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('npwp', $company->npwp)" />

                        </div>

                        <div>

                            <x-input-label
                                for="nib"
                                value="NIB" />

                            <x-text-input
                                id="nib"
                                name="nib"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('nib', $company->nib)" />

                        </div>

                        <div>

                            <x-input-label
                                for="director_name"
                                value="Director Name" />

                            <x-text-input
                                id="director_name"
                                name="director_name"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('director_name', $company->director_name)" />

                        </div>

                        <div>

                            <x-input-label
                                for="tax_name"
                                value="Tax Name" />

                            <x-text-input
                                id="tax_name"
                                name="tax_name"
                                type="text"
                                class="block mt-1 w-full"
                                :value="old('tax_name', $company->tax_name)" />

                        </div>

                    </div>

                    <div class="mt-10">

                        <x-primary-button>

                            Save Company Profile

                        </x-primary-button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>