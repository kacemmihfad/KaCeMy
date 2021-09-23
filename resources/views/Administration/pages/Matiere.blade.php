@extends('Administration/layouts/Layout')

@section('content')
<header class="page-header">
<ol class="breadcrumb">
    <li><a href="{{ url('Home') }}">Home</a></li> 
    <li class="active">Module</li>
  </ol>
</header> 
<!-- start: page -->
    <section class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                  <form action="saveMat" method="POST">
                  @csrf
                  <tr class="gradeX">
                        <td> 
                          <div class="col-sm-8">
                            <input name="nom" type="text" class="form-control" id="Nom" placeholder="Nom du Module" required="required">
                          </div>
                        </td>
                        <td>
                                            <div class="col-sm-6">
                                                <select name="filiere" id="filiere">
                                                    @foreach ($filieres as $filiere)
                                                        <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <a href="{{ url('filiere') }}" class="btn btn-default">Autre</a>
                                        </td>
                        <td>
                          <select name="an">
                            <option value="11">Semestre 1</option>
                            <option value="12">Semestre 2 </option>
                            <option value="21">Semestre 3</option>
                            <option value="22">Semestre 4</option>
                            <option value="31">Semestre 5</option>
                            <option value="32">Semestre 6</option>
                          </select>
                        </td>
                         
                        <td>
                         
                            <button type="submit" class="btn btn-primary
                            "><i class="fa fa-plus"></i></button>
                            </td>
                            
                  </tr>
                  </form>
                    <tr>
                        <th>Module</th> 
                        <th>Filière</th> 
                        <th>Semestre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if ($matiere->count())
                    @foreach($matiere as $mat)
                      <tr class="gradeX">
                          <td>{{ $mat->nom }}</td>
                          <td>{{ $mat->filiere->nom }}</td>
                       
                          <td>
                            @if($mat->annee==11)
                            Semestre 1
                            @elseif($mat->annee==12)
                            Semestre 2
                            @elseif($mat->annee==21)
                            Semestre 3
                            @elseif($mat->annee==22)
                            Semestre 4
                            @elseif($mat->annee==31)
                            Semestre 5
                            @elseif($mat->annee==32)
                            Semestre 6
                            @endif
                          </td>
                          <td><a href="Matdelete/{{ $mat->id }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                      </tr>
                    @endforeach
                  @else
                  <tr class="gradeX">
                        <td></td>
                  </tr>
                  @endif
                </tbody>
            </table>
        </div>
    </section>
<!-- end: page -->
@endsection
