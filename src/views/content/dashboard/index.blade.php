<x-unity-user::layout.main>

    <div class="card col-span-1 row-span-3 shadow-lg xl:col-span-2 bg-base-200 m-4">
        <div class="card-body">
            <h1 class="my-4 text-5xl font-bold card-title">Plan Information</h1>
            <h1 class="my-4 text-4xl font-bold card-title">Your activation key below</h1>
            <h2 class="my-4 text-3xl font-bold card-title">{{ $userKey->key }}</h2>
            <h3 class="my-4 text-2xl font-bold card-title">Plan
                @if ($userKey->plan == 1)
                <div class="badge badge-primary">Free</div>
                @else
                <div class="badge badge-secondary">Paid</div>
                @if (!empty($userKey->end_subscription))
                <div class="badge badge-error">Your Subscription has been canceled and after the
                    {{ $userKey->end_subscription->format('d/m/Y') }} You will lose premium features access.</div>
                @endif
                @endif
            </h3>
            <div class="mb-4 space-x-2 card-actions">
                <div>
                    <button class="btn">
                        Subscription Start
                        <div class="badge ml-2">
                            {{ $userKey->start_subscription->format('d/m/Y') }}
                        </div>
                    </button>
                </div>
                @if ($userKey->plan == 2)
                <div>
                    <button class="btn btn-secondary ">
                        Subscription renewal
                        <div class="badge ml-2">
                            {{ $userKey->expire_subscription->format('d/m/Y') }}
                        </div>
                    </button>
                </div>
                @endif
                @if (!empty($userKey->end_subscription))
                <div>
                    <button class="btn btn-info ">
                        End off Paid Plan
                        <div class="badge ml-2">
                            {{ $userKey->end_subscription->format('d/m/Y') }}
                        </div>
                    </button>
                </div>
                @endif
                @if ($userKey->plan == 2)
                <div>
                    <button class="btn btn-secondary ">
                        Paid Amount
                        <div class="badge ml-2">
                            £{{ $userKey->price }}
                        </div>
                    </button>
                </div>
                @endif
            </div>
            <div id="payment-container" style="display:none">
                <x-unity-user::form.form action="{{ route('subscription.upgrade') }}">
                    {{-- display the payment button --}}
                    <x-gateway::payment.stripe_card />
                </x-unity-user::form.form>
            </div>
            <div class="justify-end space-x-2 card-actions">
                @if ($userKey->plan == 1 && empty($userKey->end_subscription))
                {{-- Display the upgrade select --}}
                <select class="select select-bordered select-primary w-full max-w-xs" id="plan_id" name="plan"
                    onchange="tooglePayment()">
                    <option disable value="upgrade" selected>Upgrade Plan</option>
                    <option value="free">Free</option>
                    <option value="paid">Paid £2 month, cancel anytime</option>
                </select>

                @elseif($userKey->plan == 2 && empty($userKey->end_subscription))
                <a href="{{ route('subscription.cancel', encrypt($userKey->subscription_ref)) }}"
                    class="btn btn-secondary">Cancel Subscription</a>
                @else
                {{-- Display the upgrade select --}}
                <div class="space-y-4">
                    <select class="select select-bordered select-primary w-full max-w-xs" id="plan_id" name="plan"
                        onchange="tooglePayment()">
                        <option disable value="upgrade" selected>Upgrade Plan</option>
                        <option value="free">Free</option>
                        <option value="paid">Paid £2 month, cancel anytime</option>
                    </select>
                </div>

                @endif

                @push('js')
                <script>
                    document.querySelector('#plan_id').value = 'upgrade';
                        function tooglePayment() {
                                var element          = document.querySelector('#plan_id');
                                var paymentContainer = document.querySelector('#payment-container');
                                if (element.value == 'paid') {
                                    paymentContainer.style.display = "block";
                                } else {
                                    paymentContainer.style.display = "none";
                                }
                            }
                </script>
                @endpush

            </div>
        </div>

        @if ($userKey->plan == 1)

        <div class="card col-span-1 row-span-3 shadow-lg xl:col-span-2 bg-base-100 m-4">
            <div class="card-body">
                <h2 class="my-4 text-4xl font-bold card-title">Free Plan usage</h2>

                <div class="w-full shadow stats">
                    <div class="stat">
                        <div class="stat-figure text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="stat-title">Components Downloads</div>
                        <div class="stat-value text-primary">{{ $userKey->components_downloads }}</div>
                    </div>
                    <div class="stat">
                        <div class="stat-figure text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="stat-title">Page Downloads</div>
                        <div class="stat-value text-info">{{ $userKey->pages_downloads }}</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Uploads</div>
                        <div class="stat-value">{{ $userKey->uploads }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

</x-unity-user::layout.main>
