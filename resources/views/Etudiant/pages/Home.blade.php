@extends('Etudiant/layouts/Layout')

@section('content') 
<div class="container-fluid">


<div class="panel panel-default panel-main">
  <div class="panel-body">
    
  <ol class="breadcrumb">
    <li><a  href="{{ url('Home') }}">Home</a></li>
    <li class="active">Profile</li>
  </ol>
  <div class="clear"></div><hr>


     
    <div class="col-md-12" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-lg-3" align="center"> 


                 <img src="student.png" class="img-thumbnail img-responsive" alt="">
                                      
                </div>
                
    
                <div class=" col-md-9 col-lg-9"> 
                  <table class="table table-user-information">
                    <tbody>

                      <tr>
                        <td> Nom :</td>
                        <td class="td_details">{{ $user->utilisateur->nom }} </td>
                      </tr>
                      <tr>
                        <td>Prénom :</td>
                        <td class="td_details"> {{$user->utilisateur->prenom }}</td>
                      </tr>
                      <tr>
                        <td>CNE:</td>
                        <td class="td_details"> {{ $user->utilisateur->adresse }} </td>
                      </tr>
                      <tr>
                        <td>Adresse e-mail :</td>
                        <td class="td_details"> {{ $user->utilisateur->email }}</td>
                      </tr>
                      <tr>
                        <td>Téléphone :</td>
                        <td class="td_details">+212{{ $user->utilisateur->GSM }}</td>
                      </tr>

                                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
           
            
          </div>

  </div>


<div class="col-md-12">

 

<div class="clear"></div> <hr>      

 

            <div class="col-md-6">

            </br>
            </br>
            </br>

          </div>

</div>  
     



  </div>
</div>

</div>
@endsection