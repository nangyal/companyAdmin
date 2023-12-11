<x-dashboard>
    <div class="offset-3 col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update company details</h3>
            </div>

            <form action="{{ route('company.update', ['company' => $company->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">{{ __('messages.Company name') }}</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="{{ __('messages.Company name') }}" value="{{ $company->name }}">
                        @error('name')
                            <span class="show-error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ $company->email }}">
                        @error('email')
                            <span class="show-error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="website">{{ __('messages.Website') }}</label>
                        <input type="url" class="form-control" id="website" name="website"
                            placeholder="{{ __('messages.Website') }}" value="{{ $company->website }}">
                        @error('website')
                            <span class="show-error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('messages.Logo upload') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <label class="custom-file-label"
                                    for="images">{{ __('messages.Choose file') }}</label>
                                <input type="file" class="custom-file-input" id="image" name="image"
                                    accept="image/*">
                            </div>
                            @error('image')
                                <span class="show-error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
                </div>
            </form>
            <div>
                <a href="{{ route('company.index') }}"
                    class="btn btn-success">{{ __('messages.Back to the company') }}</a>
            </div>
        </div>
    </div>
</x-dashboard>
