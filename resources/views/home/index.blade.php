@extends('layouts.default')

@section('content')
    <h1>Say hello to Laravel 5.3</h1>
@endsection

@section('script')
    <script type="text/javascript">
        console.log(new Person('Tungshooter').greet());
    </script>
@endsection
