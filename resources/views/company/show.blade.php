<x-dashboard>
    <section class="content">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div>

                        @if ($company->image)
                            <img src="{{ asset(config('image.company_avatar_public_path')) }}/{{ $company->image }}"
                                style="border-radius: 50%; width:100px" alt="">
                        @else
                            <img src="{{ asset('/assets/images') }}/default_avatar.jpg"
                                style="border-radius: 50%; width:100px" alt="">
                        @endif

                        <h2>{{ $company->name }}</h2>
                        <p class="lead mb-5">{{ $company->email }}<br />
                            {{ $company->website }}<br /><br />
                            <a href="{{ route('company.index') }}" class="btn btn-primary">{{ __('messages.Back') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('employee.index', ['employees' => $employees])

</x-dashboard>
