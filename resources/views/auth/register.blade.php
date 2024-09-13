<x-layout>
    <div class="space-y-14">
        <section>
            <x-page-heading>Register</x-page-heading>
        </section>

        <section>
            <form method="POST" action="/register" class="space-y-10">
                @csrf
                <x-form-field>
                    <x-form-label for="name">Name:</x-form-label>
                    <x-form-input name="name" id="name" type="text" autocomplete="name" placeholder="Your Name" :value="old('name')" required />
                    <x-form-error name="name"></x-form-error>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="email">Email:</x-form-label>
                    <x-form-input name="email" id="email" type="email" autocomplete="email" placeholder="Your Email" :value="old('email')" required />
                    <x-form-error name="email"></x-form-error>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="password">Password:</x-form-label>
                    <x-form-input name="password" id="password" type="password" autocomplete="password" placeholder="Your Password" required />
                    <x-form-error name="password"></x-form-error>
                </x-form-field>

                <x-form-field>
                    <x-form-label for="password_confirmation">Confirm Password:</x-form-label>
                    <x-form-input name="password_confirmation" id="password_confirmation" type="password" autocomplete="password_confirmation" placeholder="Confirm Your Password" required />
                    <x-form-error name="password_confirmation"></x-form-error>
                </x-form-field>

                <div class="flex justify-center">
                    <x-button type="submit" color="green" tag="input">Register</x-button>
                    <x-button type="reset" color="red" tag="input">Clear</x-button>
                </div>
            </form>
        </section>
    </div>
</x-layout>