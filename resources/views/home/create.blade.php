<x-layout>
    <div>
        <section class="flex flex-col items-center gap-4">
            <x-page-heading>New To Do</x-page-heading>
            <x-button href="/home" color="blue" tag="a">Back to Home Page</x-button>
        </section>

        <section>
            <form method="POST" action="/home" class="flex flex-col gap-8">
                @csrf
                <x-form-field>
                    <x-form-label for="description">Description:</x-form-label>
                    <x-form-input name="description" id="description" type="text" autocomplete="description" placeholder="To Do's description" required />
                </x-form-field>

                <div class="flex justify-center">
                    <x-button type="submit" color="green" tag="input">Submit</x-button>
                    <x-button type="reset" color="red" tag="input">Clear</x-button>
                </div>
            </form>
        </section>
    </div>
</x-layout>