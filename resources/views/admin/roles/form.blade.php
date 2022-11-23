<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name', $role->name) }}" />
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label>Permissions</label>
            <ul class="list-unstyled">
                @foreach ($permissions as $p)
                    <li> <label><input type="checkbox" name="permissions[]" value="{{ $p->id }}"> {{ $p->name }}</label> </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
