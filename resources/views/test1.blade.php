내용작성

<p> 이름: {{ $name }} </p>
<p>{{!! $name !!}}</p>
<p>@{{ #name }} </p>
<p> 지금은 {{ now() }} 입니다. </p> 

@for ($i = 0; $i < 10; $i++)
<p>{{ $i }} 번째 반복문입니다.</p>
@endfor
@include('sub.inc')