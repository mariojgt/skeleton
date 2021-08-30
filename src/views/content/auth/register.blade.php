<x-unity-user::layout.login>
    <x-unity-user::auth.authconteiner title="Register">
        <x-slot name="form">
            <x-unity-user::form.form action="{{ route('register.user') }}">
                <div class="space-y-4">
                    <x-unity-user::form.text name="first_name" label="First Name" />
                    <x-unity-user::form.text name="last_name" label="Last Name" />
                    <x-unity-user::form.email name="email" label="Email" />
                    <x-unity-user::form.password name="password" label="Password" />
                    <x-unity-user::form.password name="password_confirmation" label="Password Confirm" />

                    {{-- Beskpoke --}}
                    <select class="select select-bordered select-primary w-full " id="plan_id" name="plan"
                        onchange="tooglePayment()">
                        <option value="free">Free</option>
                        <option value="paid">Paid £2 month, cancel anytime</option>
                    </select>
                </div>

                {{-- Beskpoke --}}
                <div id="payment-container" style="display:none">
                    {{-- display the payment button --}}
                    <x-gateway::payment.stripe_card />
                </div>

                {{-- Beskpoke --}}
                <div class="text-center mt-6">
                    <div id="normal-container" style="display:block">
                        <x-unity-user::form.submit name="Register" />
                    </div>
                    <p class="mt-4 text-sm">Already Have An Account? <a href="{{ route('login') }}">
                            <span class="underline cursor-pointer"> Sign
                                In</span>
                        </a>
                    </p>
                </div>

            </x-unity-user::form.form>
        </x-slot>
        <x-slot name="links">
            {{-- <div class="text-center mt-6">
                <x-unity-user::form.link route="{{ route('login') }}" name="Login" />
            </div> --}}
        </x-slot>
    </x-unity-user::auth.authconteiner>

    {{-- Beskpoke --}}
    @push('js')
    <script>
        document.querySelector('#plan_id').value = 'free';
            function tooglePayment() {
                    var element          = document.querySelector('#plan_id');
                    var paymentContainer = document.querySelector('#payment-container');
                    var normalContainer  = document.querySelector('#normal-container');
                    if (element.value == 'paid') {
                        paymentContainer.style.display = "block";
                        normalContainer.style.display  = "none";
                    } else {
                        paymentContainer.style.display = "none";
                        normalContainer.style.display  = "block";
                    }
                }
    </script>
    @endpush

</x-unity-user::layout.login>
