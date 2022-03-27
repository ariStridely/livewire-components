<div>
    <div 
        wire:ignore
    >
        <select class="select2 w-full" name="state">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
        </select>
 
        <!-- Select2 will insert its DOM here. -->
    </div>
</div>
 

@once
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/select2@4.0.3/dist/css/select2.css">
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>
        <script src="https://unpkg.com/select2@4.0.3/dist/js/select2.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endpush
@endonce