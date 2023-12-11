<x-dashboard>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('company.create') }}"
                    class="btn btn-primary">{{ __('messages.Add Company') }}</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('messages.Company name') }}</th>
                        <th>Email</th>
                        <th>{{ __('messages.Website') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <a href="{{ route('company.destroy', ['company' => $company->id]) }}"
                                    class="btn btn-danger"
                                    onclick="return confirm(' {{ __('messages.Are you sure you want to delete?') }}');">{{ __('messages.Delete') }}</a>
                                <a href="{{ route('company.edit', ['company' => $company->id]) }}"
                                    class="btn btn-primary">{{ __('messages.Edit') }}</a>
                                <a href="{{ route('company.show', ['company' => $company->id]) }}"
                                    class="btn btn-success">{{ __('messages.Show') }}</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tr>
                    <th colspan="5">{{ $companies->links() }}</th>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</x-dashboard>
