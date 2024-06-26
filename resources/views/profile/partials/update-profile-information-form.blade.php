<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Individual') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
                
        <div>
            <x-input-label for="phone_number" :value="__('Telephone')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $user->phone_number)" required autofocus autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Areas of Expertise') }}
        </h2>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="income_tax" class="inline-flex items-center">
                    <input id="income_tax" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Income Tax') }}</span>
                </label>
            </div>

            <div>
                <label for="ct" class="inline-flex items-center">
                    <input id="ct" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('CT') }}</span>
                </label>
            </div>

            <div>
                <label for="indirect_tax" class="inline-flex items-center">
                    <input id="indirect_tax" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Indirect Tax') }}</span>
                </label>
            </div>
    
            <div>
                <label for="private_client" class="inline-flex items-center">
                    <input id="private_client" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Private Client') }}</span>
                </label>
            </div>
             
            <div>
                <label for="estate_tax" class="inline-flex items-center">
                    <input id="estate_tax" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Estate Tax') }}</span>
                </label>
            </div>
             
            <div>
                <label for="bespoke_advice" class="inline-flex items-center">
                    <input id="bespoke_advice" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Bespoke Advice') }}</span>
                </label>
            </div>
    
          </div>
          
       
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Social Icons Link') }}
        </h2>

        <div>
            <x-input-label for="linkedin_link" :value="__('LinkedIn')" />
            <x-text-input id="linkedin_link" name="linkedin_link" type="text" class="mt-1 block w-full" :value="old('linkedin_link', $user->linkedin_link)" required autofocus autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin_link')" />
        </div>

        <div>
            <x-input-label for="facebook_link" :value="__('Facebook')" />
            <x-text-input id="facebook_link" name="facebook_link" type="text" class="mt-1 block w-full" :value="old('facebook_link', $user->facebook_link)" required autofocus autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('facebook_link')" />
        </div>

        <div>
            <x-input-label for="twitter_link" :value="__('Twitter')" />
            <x-text-input id="twitter_link" name="twitter_link" type="text" class="mt-1 block w-full" :value="old('twitter_link', $user->twitter_link)" required autofocus autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('twitter_link')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
