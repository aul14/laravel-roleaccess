@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Permission'])
    <div class="row mt-4 mx-4 py-5">
        <div class="col-12">
            @if (session()->has('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> {{ session('error') }}</strong>
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Form Add Permission</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Key Permission <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" autocomplete="off" required
                                        name="name" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="module_id">Module <span style="color: red;">*</span></label>
                                    <select name="module_id" data-live-search="true" id="module_id"
                                        class="form-control chosen-select" required>
                                        <option value=""></option>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}"
                                                {{ Input::old('module_id') == $module->id ? 'selected' : '' }}>
                                                {{ $module->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('module_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="display_name">Display Name <span style="color: red;">*</span></label>
                                    <input type="text" value="{{ old('display_name') }}"
                                        class="form-control @error('display_name') is-invalid @enderror" required
                                        name="display_name" id="display_name">
                                    @error('display_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description </label>
                                    <input type="text" value="{{ old('description') }}"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        id="description">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="{{ route('permissions.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
