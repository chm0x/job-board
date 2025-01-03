<div>
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input  type="radio" 
                name="{{ $name }}"
                value="" 
                @checked( !request( $name ) ) 
        />
        <span class="ml-2 dark:text-black">All</span>
    </label>

    @foreach ($optionsWithLabels as $label => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input 
                type="radio" 
                name="{{ $name }}" 
                value="{{ $option }}"
                @checked($option === request($name)) 
            />

            <span class="ml-2 dark:text-black"> {{ Str::ucfirst($option) }} </span>
        </label>
    @endforeach
</div>
