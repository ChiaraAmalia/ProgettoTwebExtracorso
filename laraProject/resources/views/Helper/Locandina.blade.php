@php
        if (empty($imgFile)) {
            $imgFile = 'default.jpg';
        }
        

@endphp
<img src="{{ asset('images/locandine/' . $imgFile) }}" object-fit="cover">