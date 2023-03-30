<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
    <x-slot name="logo">
        {{-- <x-application-mark /> --}}
    </x-slot>

    <x-validation-errors class="mb-4" />

    <div class="mb-6 ">
        <div class="flex justify-center  dark:bg-gray-900">
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="bg-zinc-700 p-6 rounded-lg mt-6">
                @csrf
                @method('PUT')
                <div class="flex justify-center font-semibold mb-4">
                    <h2 class="text-[#EDB12C]">Gebruiker aanpassen</h2>
                </div>
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ $user->name }}" autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                        value="{{ $user->email }}" autocomplete="username" />
                </div>
                <div class="mt-4">
                    <x-label for="geboorte_datum" value="{{ __('Geboorte datum') }}" />
                    <x-input id="geboorte_datum" class="block mt-1 w-full" type="date"
                        value="{{ old('geboorte_datum', \Carbon\Carbon::createFromFormat('Y-m-d', $user->geboorte_datum ?? '')->format('Y-m-d')) }}"
                        name="geboorte_datum" autocomplete="bday" />
                    @error('geboorte_datum')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Make changing the passwords optional --}}
                {{-- <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" autocomplete="new-password" />
                </div> --}}


                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-4" type="submit">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    {{-- bg-zinc-800  "Donkere grijs"
    bg-zinc-700  "lichtere grijs"
      text-[#EDB12C] "geel orange"
      bg-black " zwarte achtergrond"   --}}

</x-app-layout>
