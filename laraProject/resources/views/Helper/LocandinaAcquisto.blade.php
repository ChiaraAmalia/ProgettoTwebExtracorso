@php
        if (empty($imgFile)) {
            $imgFile = 'default.jpg';
        }
        

@endphp
<img src="{{ asset('images/locandine/' . $imgFile) }}"  width="150" height="150" object-fit="cover">

