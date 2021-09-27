    <div class="{{ $col }}">
        <div class="form-group">
            <label class="small mb-1" for="{{ $for }}">{{ $label ?? $input ?? "ERRO" }}</label>
            {!! Form::select($select, $value ?? null, $selected, $attributes) !!}
        </div>
    </div>
