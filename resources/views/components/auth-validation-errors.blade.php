@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            <span style="color: red;">{{ __('Whoops! Something went wrong.') }}</span>
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <span style="color: red;">{{ $error }}</span>
            @endforeach
        </ul>
    </div>
@endif
