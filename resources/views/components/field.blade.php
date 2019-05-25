<div class="field">
    <p class="control has-icons-left has-icons-right">
        {!! $slot !!}
        <span class="icon is-small is-left">
            <i class="fa {{$icon}}"></i>
        </span>

        @isset($fieldName)
            @error($fieldName)
                <span class="icon is-small is-right">
                    <i class="fa fa-exclamation-triangle"></i>
                </span>
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        @endisset
    </p>
</div>