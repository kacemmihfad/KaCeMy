@extends('Professeur/layouts/Layout')

@section('content')
<div class="container-fluid">


<div class="panel panel-default panel-main">
  <div class="panel-body">
    
  <ol class="breadcrumb">
    <li><a href="{{ url('Home') }}">Home</a></li>
    <li class="active">lessons</li>
  </ol>
  
<a href="{{ url('Nvless') }}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i> nouveau lesson</a>


<div class="clear"></div><hr>




<div class="clear"></div>

    <div class="table-responsive">
      <table class="table table table-striped table-bordered">
        <thead>
          <tr class="tr">
            <th>title</th>
            <th>Télécharger</th>
            <th>modifier</th>
            <th>supprimer</th>
          
          </tr>
        </thead>
        <tbody>




          <tr class="tr-body">

            <td><a class="table-link" href=" ">PROGRAMMATION</a></td>

            <td>
                        <a href=" "><i class="glyphicon glyphicon-paperclip large"></i></a>
                        </td>

            <td><a href=" "><i class="fa fa-edit large"></i></a></td>

            <td><a href=" "><i class="glyphicon glyphicon-trash large"></i></a></td>
 

          </tr>

          <tr class="tr-body">

            

          </tr>
 

        </tbody>
      </table>
    </div><!-- /.table-responsive -->

    <div class="clear"></div>
    <div class="center">
        
    </div>


  </div>
</div>



</div>


@endsection