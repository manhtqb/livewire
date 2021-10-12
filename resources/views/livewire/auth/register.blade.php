<form wire:submit.prevent="register">
    <div class="py-56 h-screen bg-gray-100 px-2">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-md">
            <div class="md:flex">
                <div class="w-full p-3 px-6 py-10">
                    <div class="text-center"><span class="text-xl text-gray-700">Registration Form</span></div>
                    <div class="mt-4 relative">
                        <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Email</span>
                        <input wire:model.lazy="email" type="text" id="email" name="email"
                               class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600">
                    </div>
                    <div class="mt-1 text-sm text-red-500">@error('email'){{$message}}@enderror</div>
                    <div class="mt-4 relative">
                        <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Password</span>
                        <input wire:model.lazy="password" type="password" id="password" name="password"
                               class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600">
                    </div>
                    <div class="mt-1 text-sm text-red-500">@error('password') <span>{{$message}}</span> @enderror</div>
                    <div class="mt-4 relative">
                        <span class="absolute p-1 bottom-8 ml-2 bg-white text-gray-400 ">Password Confirmation</span>
                        <input wire:model.lazy="passwordConfirmation" type="password" id="passwordConfirmation"
                               name="passwordConfirmation"
                               class="h-12 px-2 w-full border-2 rounded focus:outline-none focus:border-red-600">
                    </div>
                    <div class="mt-1 text-sm text-red-500">
                        @error('passwordConfirmation')<span>{{$message}}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="h-12 w-full bg-blue-900 text-white rounded hover:bg-blue-700">
                            Register
                            <i class="fa fa-long-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
{{--<form wire:submit.prevent="register">--}}
{{--    <div>--}}
{{--        <label for="email">email</label>--}}
{{--        <input wire:model.lazy="email" type="text" id="email" name="email">--}}
{{--        @error('email') <span>{{$message}}</span> @enderror--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label for="password">password</label>--}}
{{--        <input wire:model.lazy="password" type="password" id="password" name="password">--}}
{{--        @error('password') <span>{{$message}}</span> @enderror--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <label for="passwordConfirmation">passwordConfirmation</label>--}}
{{--        <input wire:model.lazy="passwordConfirmation" type="password" id="passwordConfirmation" name="passwordConfirmation">--}}
{{--        @error('passwordConfirmation') <span>{{$message}}</span> @enderror--}}
{{--    </div>--}}

{{--    <div>--}}
{{--        <input type="submit" value="Register">--}}
{{--    </div>--}}
{{--</form>--}}
