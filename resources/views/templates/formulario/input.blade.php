
    <div class="{{ $col }}">
        <div class="form-group">
            <label class="small mb-1" for="{{ $for }}">{{ $label ?? $input ?? "ERRO" }}</label>
            {!! Form::text($input, $value ?? null, $attributes) !!}
        </div>
    </div>
