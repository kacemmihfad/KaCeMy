@extends('Administration/layouts/Layout')

@section('content')


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

          <div class="item active">
        <a href="#1"><img src="{!! asset('1565041976_s4.jpg') !!}"  alt=""></a>
      </div>
    
          <div class="item">
        <a href="#2"><img src="{!! asset('1565042092_s2.jpg') !!}" alt=""></a>
      </div>
    
           <div class="item">
        <a href="#3"><img src="{!! asset('1565041955_s3.jpg') !!}" alt=""></a>
      </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="slide-hr"></div>


<div class="clear"></div>

</br>
</br>
 </br>
 
 <div align="center" class="row url-icons">

    <div align="center" class="col-md-4">
      <a href="{{ url('Home') }}">
          <div class="link">
            <img src=" {!! asset('home128.png') !!}" width="80px" alt="">
            <div class="clear"></div><span>Accueil</span>
         </div>
      </a>
    </div> 

     
        <div align="center" class="col-md-4">
      <a href=" http://www.fs.ucd.ac.ma/fs/">
          <div class="link">
            <img src="{!! asset('school.png') !!}" width="80px" alt="">
            <div class="clear"></div><span>UCD</span>
         </div>
      </a>
    </div>

    <div align="center" class="col-md-4">
      <a href="{{ url('profil') }}">
          <div align="center"class="link">
            <img src="{!! asset('1476216378_user_info.png') !!}" width="80px" alt="">
            <div class="clear"></div><span>Mon profil</span>
         </div>
      </a>
    </div>

 

</div> 
@endsection