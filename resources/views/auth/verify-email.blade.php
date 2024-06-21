<x-layout>

    <div class=" flex flex-col justify-center text-center">
        <h1 class="bg-emerald-500 py-2 px-3 text-emerald-900">A link to verify your email has been send to your email
            address </h1>

        <p>Didn't get the email</p>
        <form action="{{route('verification.send')}}" method="POST">
            @csrf
            <button class="bg-emerald-500 text-white ">Send agian</button>
        </form>
    </div>
</x-layout>