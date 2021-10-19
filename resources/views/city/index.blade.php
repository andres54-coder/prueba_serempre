
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
            {{ __('Ciudades') }}
        </h2>
        <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold mb-2 py-2 px-4 border border-purple-600  rounded cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150" href="{{route('city.create')}}">
            Crear
        </a>
        <form action="{{route('city.index')}}" method="get">
            <div class="mt-6 mb-3">
                <label for="search" class="text-sm font-medium text-gray-900 block mb-2">buscar registro por: <strong>nombre,cod</strong></label>
                <input type="text" id="search"  name="search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{$text}}">
            </div>
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold mb-2 py-2 px-4 border border-purple-600  rounded cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150" type="submit">
                buscar
            </button>
        </form>
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
                        <table class="min-w-full border-collapse block md:table">
                            <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">cod</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">nombre</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
                            </tr>
                            </thead>
                            <tbody class="block md:table-row-group">
                            @foreach($cities as $city)
                                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$city->cod}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$city->name}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                        <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded" href="{{route('city.show',$city->id)}}">ver</a>
                                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded" href="{{route('city.edit',$city->id)}}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$cities->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

