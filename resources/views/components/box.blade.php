<div class="columns @isset($class){{$class}}@endisset">
    <div class="column is-half is-offset-one-quarter">
        <div class="box">
            <h1 class="title">@isset($title){{$title}}@endisset</h1>
            {!! $slot !!}
        </div>
    </div>
</div>