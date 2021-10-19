
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tablero de importaciones y exportaciones clientes') }}
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
                        <form action="{{route('import.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label
                                class="flex-1 w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                                <i class="fas fa-cloud-upload-alt fa-3x"></i>
                                <span class="mt-2 text-base leading-normal">Seleccione un archivo</span>
                                <input type='file' class="hidden" id="inputFile" name="inputFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
                            </label>
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold mt-2 py-2 px-4 border border-purple-600  rounded cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150" type="submit">
                                Importar
                            </button>
                        </form>
                        <div class="flex-1 p-5">
                            <a  class="inline-bloc" id="fileName"></a><br>
                            <a class="inline-bloc" id="fileSize"></a>
                        </div>
                        <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold mt-2 py-2 px-4 border border-purple-600  rounded cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150" href="{{route('import.export')}}">
                            exportar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
