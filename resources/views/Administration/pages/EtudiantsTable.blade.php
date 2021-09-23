@extends('Administration/layouts/Layout')

@section('content')
<script>
        function fill(id,nom,prenom,email,address,montant,gsm,pwd){
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            document.getElementById('inputNom').value=nom;
            document.getElementById('inputPrenom').value=prenom;
            document.getElementById('inputEmail').value=email;
            document.getElementById('inputAddress').value=address;
            document.getElementById('inputMontant').value=montant;
            document.getElementById('inputGSM').value=gsm;
            document.getElementById('inputPwd').value=pwd;
            document.getElementById('inputId').value=id;
        }
    </script>
 
<div class="container-fluid">


<div class="panel panel-default panel-main">
  <div class="panel-body">
      
  @if(session()->has('errorE'))
        <div class="don-t-print alert alert-danger alert-dismissible">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <p>{{ session()->get('errorE') }}</p>
        </div>
    @endif

    @if($errors->first('gsm')!='')
        <div class="don-t-print alert alert-danger alert-dismissible">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <p>{{ $errors->first('gsm') }}</p>
        </div>
    @endif

    @if(session()->has('successE'))
        <div class="don-t-print alert alert-success alert-dismissible">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <p>{{ session()->get('successE') }}</p>
        </div>
    @endif
     
    <div class="col-md-12" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><a href=" "><b>Home</b></a>/Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-lg-3" align="center"> 


                 <img src="{!! asset('student.png') !!}" class="img-thumbnail img-responsive" alt="">
                                      
                </div>
                
    
                <div class=" col-md-9 col-lg-9"> 
                  <table class="table table-user-information">
                    <tbody>
                    <form action="{{ url('saveE') }}" method="POST">
                                    @csrf
                      <tr> 
                        <td class="td_details"> <input type="hidden" name="edit" id="inputId" value="0"></td>
                      </tr>
                      <tr>
                        <td>Prénom:</td>
                        <td class="td_details"> <input name="prenom" type="text" class="form-control" id="inputPrenom" placeholder="Prenom" required="required"></td>
                      </tr>
                      <tr>
                        <td>Nom :</td>
                        <td class="td_details">  <input name="nom" type="text" class="form-control" id="inputNom" placeholder="Nom" required="required"></td>
                      </tr>
                      
                      <tr>
                        <td>CNE :</td>
                        <td class="td_details"><input name="adresse" class="form-control" id="inputAddress" type="text" placeholder="Code Massar" required="required"></td>
                      </tr>
                       <tr>
                        <td>Téléphone: &ensp;  &ensp;   +212</td>
                        <td class="td_details"><input name="gsm" type="number" class="form-control" id="inputGSM" placeholder="6....." required="required"></td>
                      </tr>
                      <tr>
                        <td>Adresse e-mail :</td>
                        <td class="td_details"><input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" required><input type="hidden" name="id" value="{{ $g_id }}"> </td>
                      </tr>
                    
                     <tr>
                        <td></td>
                        <td class="td_details"><button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button> </td>
                      </tr>
                    </form>                 
                    </tbody>
                    
                  </table>
                  
                </div>
              </div>
            </div> 
          </div> 
  </div>
<div class="col-md-12">    
            <div class="table-responsive">

              <table class="table table table-striped table-bordered">
 <tr class="tr">
                                <th class="don-t-print">ID</th>
                                <th class="don-t-print">Password</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>CNE</th>
                                <th>TEL</th>
                                <th>Email</th>
                                <th class="don-t-print">Action</th>
                            </tr>
                            <tbody>
                                @if ($etudiants->count())
                                    @foreach($etudiants as $etudiant)

                                        <tr class="tr-body">
                                            <td class="don-t-print">{{ $etudiant->utilisateur->id }}</td>
                                            <td class="don-t-print">{{ $etudiant->utilisateur->pwd }}</td>
                                            <td>{{ $etudiant->utilisateur->prenom }}</td>
                                            <td>{{ $etudiant->utilisateur->nom }}</td>
                                            <td>{{ $etudiant->utilisateur->adresse }}</td>
                                            <td>+212{{ $etudiant->utilisateur->GSM }}</td>
                                            <td>{{ $etudiant->utilisateur->email }}</td>
                                            <td class="don-t-print">
                                                <table class="act">
                                                    <tr>
                                                        <td>
                                                            <button onclick="fill('{{ $etudiant->id }}','{{ $etudiant->utilisateur->nom }}','{{ $etudiant->utilisateur->prenom }}','{{ $etudiant->utilisateur->email }}','{{ $etudiant->utilisateur->adresse }}','{{ $etudiant->montant }}','{{ $etudiant->utilisateur->GSM }}');" class="btn btn-file"><i class="fa fa-pencil"></i></button>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('Edelete/'.$etudiant->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                            </td>
                                        </tr>

                                    @endforeach
                                @else
                                <tr class="tr-body">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="don-t-print"></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="don-t-print">
                            @if ($etudiants->count())
                                {{ $etudiants->links() }}
                            @endif
                        </div>
</table>
          </div>

</div>  
     



  </div>
</div>

</div>
@endsection
