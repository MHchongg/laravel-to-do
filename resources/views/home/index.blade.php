<x-layout>
    <div class="space-y-8 flex flex-col items-center">
        <section class="w-10/12 space-y-5">
            <x-page-heading>In Progress's To Do - {{ auth()->user()->name }}</x-page-heading>

            <ol class="list-decimal space-y-5">
                @foreach ($todos_ip as $todo)
                    <li>
                        <div class="flex justify-between items-center bg-white p-2 rounded-lg">
                            <span>{{ $todo->description }}</span>

                            <div class="flex">
                                <form method="POST" action="/home/{{ $todo->id }}/complete">
                                    @csrf
                                    @method('PATCH')

                                    <x-button color="green" tag="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>

                                        Complete
                                    </x-button>
                                </form>

                                <x-button href="home/{{ $todo->id }}/edit" color="blue" tag="a">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-4">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                    </svg>

                                    Edit
                                </x-button>

                                <form method="POST" action="/home/{{ $todo->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <x-button color="red" tag="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4">
                                            <path
                                                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                            <path fill-rule="evenodd"
                                                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        Delete
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>
        </section>

        <section class="w-10/12 space-y-5">
            <x-page-heading>Completed To Do - {{ auth()->user()->name }}</x-page-heading>

            <ol class="list-decimal space-y-5">
                @foreach ($todos_c as $todo)
                    <li>
                        <div class="flex justify-between items-center bg-white p-2 rounded-lg">
                            <span>{{ $todo->description }}</span>

                            <div class="flex">
                                <form method="POST" action="/home/{{ $todo->id }}/unfinish">
                                    @csrf
                                    @method('PATCH')

                                    <x-button color="amber" tag="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>

                                        Unfinish
                                    </x-button>
                                </form>

                                <form method="POST" action="/home/{{ $todo->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <x-button color="red" tag="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4">
                                            <path
                                                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                            <path fill-rule="evenodd"
                                                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        Delete
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>
        </section>

        <section>
            <x-button href="/home/create" color="amber" tag="a">
                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>

                New to do
            </x-button>
        </section>
    </div>

    @if (session('fail'))
        <x-alert type="danger" :message="session('fail')" />
    @endif

    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif
</x-layout>
