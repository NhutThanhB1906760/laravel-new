@extends('welcome')

@section('content')
<p>This is my body content.</p>
@endsection

@push('scripts', '<script>
alert("Hello!")
</script>')

@push('scripts')
<script>
alert("Hello again!")
</script>
@endpush