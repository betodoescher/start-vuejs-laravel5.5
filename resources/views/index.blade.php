<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  <!-- <link rel="stylesheet" href="/css/sb-admin-2.min.css"> -->
</head>
<body>
  <div id="app"></div>

  @include('scripts')
</body>
</html>
