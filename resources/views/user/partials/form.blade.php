@csrf
<div class="mb-6">
    <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nombre</label>
    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            @isset($user)
                value="{{$user->name}}"
            @endisset
           required>
</div>
<div class="mb-6">
    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">email</label>
    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
           @isset($user)
           value="{{$user->email}}"
           @endisset
           required>
</div>
<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full"
             type="password"
             name="password"
             required autocomplete="new-password" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="block mt-1 w-full"
             type="password"
             name="password_confirmation" required />
</div>
<div class="mb-6">
    <label for="file" class="text-sm font-medium text-gray-900 block mb-2">Fotografia</label>
    <input type="file" id="file" name="file" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" accept=".png,.jpg,.jpeg" required>
</div>
<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
