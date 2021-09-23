@extends('Administration/layouts/Layout')

@section('content')
<!-- Content Header (Page header) -->
    <style>
        @media print {
			.print{
				min-width: 150px !important;
				max-width: 150px !important;
            }
        }
    </style>
    <script>
        function showfield(name){
            if(name=='P')document.getElementById('matiereDiv').style.display="block";
            else document.getElementById('matiereDiv').style.display="none";
        }
        function fill(id,nom,prenom,email,address,type,gsm){
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            document.getElementById('Id').value=id;
            document.getElementById('Nom').value=nom;
            document.getElementById('Prenom').value=prenom;
            document.getElementById('Email').value=email;
            document.getElementById('Address').value=address;
            document.getElementById('GSM').value=gsm;
            document.getElementById('pr').value=type;

            var second=document.getElementById('type');
            second.value=type;

            if(type=='P')document.getElementById('matiereDiv').style.display="block";
            else document.getElementById('matiereDiv').style.display="none";
            
            var j=0;
            while (second.options[j])  {
                second.options[j].disabled = true;
                if (second.options[j].value == id)
                    second.selectedIndex = j;
                j++;
            }   
        }
    </script>
    <header class="don-t-print page-header">
    <div align="center" class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class=" ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">&nbsp;</span>
              <span class="info-box-text"><strong>Nouveau Membre</strong></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description"> Admin,Prof
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @if(session()->has('errorE'))
        <div class="don-t-print alert alert-danger alert-dismissible">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <p>{{ session()->get('errorE') }}</p>
        </div>
    @endif
    @if(session()->has('errorG'))
        <div class="don-t-print alert alert-info alert-dismissible">
            <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <p>{{ session()->get('errorG') }}</p>
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
    </header>
   
    <section class="don-t-print content-header" id="printable">
        <form action="{{ url('employers') }}" method="post">
            @csrf
            <div class="don-t-print row">
                <div class="col-sm-3">
                    <input class="Ser" placeholder="Rechercher..." type="text" name="nom">
                </div>
            </div>
        </form> 
    </section>
        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-xs-14">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="mainT print table" width=100%>
                            <thead>
                                <form action="{{ url('saveEmp') }}" method="POST">
                                    @csrf
                                    <tr class="don-t-print">
                                       
                                        <th><input type="hidden" name="edit" id="Id" value="0"></th>
                                        <th><input size="1" name="prenom" type="text" class="form-control" id="Prenom" placeholder="Prenom" required="required"></th>
                                        <th><input name="nom" type="text" class="form-control" id="Nom" placeholder="Nom" required="required"></th>
                                       
                                        <th>

                                            <table>
                                                <tr>
                                                    <td>+212</td>
                                                    <td><input name="gsm" type="number" class="form-control" id="GSM" placeholder="Telephone" required="required"></td>
                                                </tr>
                                            </table>
                                        </th>
                                        <th ><input name="adresse" class="form-control" id="Address" type="text" placeholder="ML 1010" required="required"></th>
                                       
                                        <th><input name="email" type="email" class="form-control" id="Email" placeholder="Email"></th>
                                        <th>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="pr" id="pr">
                                                        <select name="profession" id="type" onchange="showfield(this.options[this.selectedIndex].value)" value="C">
                                                            <option value="P" id="p">Professeur</option>
                                                            <option value="A" id="a">Administrateur</option> 
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div id="matiereDiv">
                                                            <select name="mat" id="matiere">
                                                                @foreach ($matiere as $mat)
                                                                    <option value="{{ $mat->id }}">@if($mat->annee==11)
                                                        S1:{{ $mat->nom }}
                                                    @elseif($mat->annee==12)
                                                        S2:{{ $mat->nom }}
                                                    @elseif($mat->annee==21)
                                                        S3:{{ $mat->nom }}
                                                    @elseif($mat->annee==22)
                                                        S4:{{ $mat->nom }}
                                                    @elseif($mat->annee==31)
                                                        S5:{{ $mat->nom }}
                                                    @elseif($mat->annee==32)
                                                        S6:{{ $mat->nom }}
                                                    @endif
                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td> 
                                                </tr>
                                            </table>
                                        </th>
                                        <th><button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button></th>
                                    </tr>
                                </form>
                            </thead>
                            <tr>
                                <th class="don-t-print">ID</th>
                                <th class="don-t-print">Password</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>CIN</th>
                                <th>Tél</th>
                                <th>Email</th>
                                <th>--</th>
                                <th>Profession</th>
                                <th class="don-t-print">Action</th>
                            </tr>
                            <tbody>
                                @if ($employers->count())
                                    @foreach($employers as $employer)
                                        <tr>
                                            <td class="don-t-print">{{ $employer->id }}</td>
                                            <td class="don-t-print">{{ $employer->pwd }}</td>
                                            <td>{{ $employer->prenom }}</td>
                                            <td>{{ $employer->nom }}</td>
                                            <td>{{ $employer->adresse }}</td>
                                            <td>+212{{ $employer->GSM }}</td>
                                            <td >{{ $employer->email }}</td>
                                            <th>--</th>
                                            <td>
                                                @if($employer->type=='P')
                                                    Professeur    &nbsp; <a href="{{ url('emploisProf/'.$employer->prof_id) }}" name="id" class="btn btn-dark">Emplois</a>
                                                @elseif($employer->type=='A')
                                                    Adminstration
                                                 
                                                @endif
                                            </td>
                                            <td class="don-t-print">
                                                <table class="act">
                                                    <tr>
                                                        <td>
                                                            <button onclick="fill('{{ $employer->id }}','{{ $employer->nom }}','{{ $employer->prenom }}'
                                                                ,'{{ $employer->email }}','{{ $employer->adresse }}','{{ $employer->type }}','{{ $employer->GSM }}');" 
                                                                class="btn btn-file"><i class="fa fa-pencil"></i></button>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('deleteEmp/'.$employer->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                            </td>
                                        </tr>

                                    @endforeach
                                @else
                                <tr>
                                    <td></td>
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
                            @if ($employers->count())
                                {{ $employers->links() }}
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>

@endsection
