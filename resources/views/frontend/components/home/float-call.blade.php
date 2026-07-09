@php
    $generalSetting = App\Models\GeneralSetting::first();
@endphp
<!-- Floating Call Button -->
<a href="tel:{{ $generalSetting->phone ?? '+917000872953' }}" class="gc-float-call-btn" aria-label="Call Now">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M3.654 1.328a.678.678 0 0 1 .737-.163l2.522 1.01c.288.115.47.397.44.705l-.215 2.22a.678.678 0 0 1-.58.596l-1.27.177a11.72 11.72 0 0 0 4.839 4.839l.177-1.27a.678.678 0 0 1 .596-.58l2.22-.215a.678.678 0 0 1 .705.44l1.01 2.522a.678.678 0 0 1-.163.737l-1.272 1.272c-.74.74-1.846 1.065-2.877.702C5.548 13.78 2.22 10.452.298 5.477c-.363-1.031-.038-2.137.702-2.877L3.654 1.328z" />
    </svg>
</a>