<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Anasayfa</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
     @include('blog.front.layout.style')
   </head>
   <body>
      
      <!-- header section start -->
       @include('blog.front.layout.header')
         <!-- about section start --> 

         @yield('content')
   
      <!-- footer section start -->
     @include('blog.front.layout.footer')
      <!-- footer section end -->
      
      <!-- Javascript files-->
      @include('blog.front.layout.script')
   </body>
</html>