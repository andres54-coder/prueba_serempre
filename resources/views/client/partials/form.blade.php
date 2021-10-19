@csrf
<div class="mb-6">
    <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nombre</label>
    <input type="text" id="name"  name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            @isset($client)
                value="{{$client->name}}"
            @endisset
           required>
</div>
<div class="mb-6">
    <label for="city" class="text-sm font-medium text-gray-900 block mb-2">ciudad</label>
    <select name="city_id" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        <option value="">Seleccione una opción</option>
        @foreach($cities as $city)
            <option value="{{$city->id}}"
                @if(isset($client))
                {{ $client->city_id == $city->id ? 'selected' : '' }}
                @endif>{{$city->name}}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
