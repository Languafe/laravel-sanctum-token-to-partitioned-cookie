<x-app-layout>

    <section class="m-4 p-4">

        <button id="create-token-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button">Obtain Token</button>


        {{-- <button id="obtain-cookie-in-new-tab-button" disabled class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="button">Obtain Cookie in a New Tab</button> --}}

        {{-- <hr />

        <form method="POST" action="{{ route('tokens.store') }}" target="_blank">
            @csrf
            <input type="hidden" name="name" value="cookieplease" />
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
        </form> --}}
    </section>

</x-app-layout>
