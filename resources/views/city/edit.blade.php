
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Ciudad') }}
        </h2>
    </x-slot>

    @if(session()->has('success'))
        <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
            <p class="font-bold">{!! session()->get('success') !!}</p>
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:container md:mx-auto inline-flex">
                        <form action="{{route('city.update',$city->id)}}" method="POST">
                            @method('PUT')
                            @include('city.partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

