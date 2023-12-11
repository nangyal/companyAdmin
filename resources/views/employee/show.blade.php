<x-dashboard>
    <section class="content">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div>

                        <h2>{{ $employee->first_name }} {{ $employee->last_name }} </h2>
                        <p class="lead mb-5">{{ $employee->email }}<br />
                            {{ $employee->phone }}<br /><br />
                            <a href="{{ URL::previous() }}" class="btn btn-primary">{{ __('messages.Back') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-dashboard>
