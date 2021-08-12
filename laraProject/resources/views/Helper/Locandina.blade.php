@php
        if (empty($imgFile)) {
            $imgFile = 'default1.jpg';
        }
        

@endphp
<img src="{{ asset('images/locandine/' . $imgFile) }}" object-fit="cover">