<x-dashboard>
    <div class="offset-3 col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update employee details</h3>
            </div>

            <form action="{{ route('employee.update', ['employee' => $employee->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">{{ __('messages.First name') }}</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="{{ __('messages.First name') }}" value="{{ $employee->first_name }}">
                        @error('first_name')
                            <span class="show-error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('messages.Last name') }}</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            placeholder="{{ __('messages.Last name') }}" value="{{ $employee->last_name }}">
                        @error('last_name')
                            <span class="show-error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ $employee->email }}">
                        @error('email')
                            <span class="show-error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="website">{{ __('messages.Phone') }}</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="{{ __('messages.Phone') }}" value="{{ $employee->phone }}">
                        @error('phone')
                            <span class="show-error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
                </div>
            </form>
            <div>
                <a href="{{ route('company.show', ['company' => $employee->company_id]) }}"
                    class="btn btn-success">{{ __('messages.Back to the company') }}</a>
            </div>
        </div>
    </div>
</x-dashboard>
