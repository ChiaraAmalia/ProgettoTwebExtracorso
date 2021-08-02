@php
        if (empty($imgFile)) {
            $imgFile = 'default.jpg';
        }
        

@endphp
<img src="{{ asset('images/locandine/' . $imgFile) }}"  width="320" height="320" object-fit="cover">