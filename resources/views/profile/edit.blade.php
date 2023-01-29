<x-home-layout>

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 ">
                <h2>Profile</h2>

                <div class="p-4 rounded bg-white shadow sm:rounded-lg mb-3">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
                <div class="p-4 rounded bg-white shadow sm:rounded-lg mb-3">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-home-layout>
