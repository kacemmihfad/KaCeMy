@extends('Administration/layouts/Layout')

@section('content')
<header class="page-header">
    <h2>Filieres</h2>
</header>


<!-- start: page -->
    <section class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                  <form action="saveFil" method="POST">
                  @csrf
                  <tr class="gradeX">
                        <td>
                          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                          <div class="col-sm-10">
                            <input name="nom" type="text" class="form-control" id="Nom" placeholder="Nom de la Filiere" required="required">
                          </div>
                        </td>
                  </tr>
                  </form>
                    <tr>
                        <th>Filiere</th>
                    </tr>
                </thead>
                <tbody>
                  @if ($filiere->count())
                  @foreach($filiere as $f)
                    <tr class="gradeX">
                        <td>{{ $f->nom }}</td>
                        <td><a href="Fildelete/{{ $f->id }}" class="btn btn-danger">Supprimer</a></td>
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
