<div>
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input  type="radio" 
                name="{{ $name }}"
                value="" 
                @checked( !request( $name ) ) 
        />
        <span class="ml-2 dark:text-black">All</span>
    </label>

    @foreach ($options as $option)
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
    {{-- @foreach (\App\Models\OfferedJob::$experience as $experience)
        <label for="experience_{{ $experience }}" class="mb-1 flex items-center">
            <input type="radio" name="experience" id="experience_{{ $experience }}" value="{{ $experience }}"
                @checked($experience === request('experience')) />
            <span class="ml-2 dark:text-black"> {{ Str::ucfirst($experience) }} </span>
        </label>
    @endforeach --}}
</div>
