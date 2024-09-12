<x-layout>
    <div class="space-y-16">
        <section>
            <x-page-heading>Log In</x-page-heading>
        </section>

        <section>
            <form method="POST" action="/login" class="space-y-10">
                @csrf
                <x-form-field>
                    <x-form-label for="email">Email:</x-form-label>
                    <x-form-input name="email" id="email" type="email" autocomplete="email" placeholder="Your Email" required />
                </x-form-field>

                <x-form-field>
                    <x-form-label for="password">Password:</x-form-label>
                    <x-form-input name="password" id="password" type="password" autocomplete="password" placeholder="Your Password" required />
                </x-form-field>

                <div class="flex justify-center">
                    <x-button type="submit" color="green" tag="input">Log In</x-button>
                    <x-button type="reset" color="red" tag="input">Clear</x-button>
                </div>
            </form>
        </section>
    </div>
</x-layout>