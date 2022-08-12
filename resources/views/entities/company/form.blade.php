<form id="company-form" class="company-form" action="{{ route('send-form') }}" method="POST" novalidate>
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label for="company_symbol" class="form-label">
                {{ __('Company Symbol') }}
            </label>
            <input type="text"
                   id="company_symbol"
                   class="form-control @error('symbol') is-invalid @enderror"
                   name="symbol"
                   value="{{ old('symbol') }}">
            @error('symbol')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="company_start_date" class="form-label">
                {{ __('Start Date') }}
            </label>
            <input type="date"
                   id="company_start_date"
                   class="form-control @error('start_date') is-invalid @enderror"
                   name="start_date"
                   value="{{ old('start_date') }}">
            @error('start_date')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="company_end_date" class="form-label">
                {{ __('End Date') }}
            </label>
            <input type="date"
                   id="company_end_date"
                   class="form-control @error('end_date') is-invalid @enderror"
                   name="end_date"
                   value="{{ old('end_date') }}">
            @error('end_date')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="company_email" class="form-label">
                {{ __('Email') }}
            </label>
            <input type="email"
                   id="company_email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   aria-describedby="emailHelp">
            @error('email')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            <div id="emailHelp" class="form-text">
                {{ __('We\'ll never share your email with anyone else.') }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-primary btn-lg mr-2 js_reset_form">
                    {{ __('Reset') }}
                </button>
                <button type="submit" class="btn btn-outline-success btn-lg">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </div>
</form>
