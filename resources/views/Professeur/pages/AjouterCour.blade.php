@extends('Professeur/layouts/Layout')

@section('content')


<div class="container-fluid">


<div class="panel panel-default panel-main">
  <div class="panel-body">
    
  <ol class="breadcrumb">
    <li><a href="{{ url('Home') }}">Home</a></li>
    <li><a href="{{ url('cour') }}">Cours</a></li>
    <li class="active">nouveau cour</li>
  </ol>
  <div class="clear"></div><hr>


        <form method="POST" action="https://dabach.co.ma/easyschool/teachers/lesson/new" accept-charset="UTF-8" class="col-md-10 col-md-offset-1" id="myForm" data-toggle="validator" enctype="multipart/form-data"><input name="_token" type="hidden" value="EukDDP2ewYtunMkN8yolhkKLGsRJbMb4qruvlIjt">

       



<div class="clear"></div>

      
              

              <div class="form-group">
                  <label class="control-label">Module  : </label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-blackboard"></i></span>
                    <select name="class_id" id="class" class="form-control  input-lg" required>
                    <option value=""></option>
                    <option value="64"> </option>
                        
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label">contenue  : </label>
          
                  <textarea id="elm1" class="form-control" rows="6" name="content" cols="50"></textarea>
             
                              </div>

              <div class="form-group">
                  <label class="control-label">Joindre fichier : </label>
                  <input class="btn btn-default" id="file" name="file" type="file">

                    
                    <span class="help-block">Types de fichier : doc, docx, ppt, pptx, pdf, xlsx</span>

              </div>


            <div class="form-group">
              <input class="btn btn-info btn-block input-lg" type="submit" value="Ajouter"> 
            </div>


              </form>

  
  </div>
  </div>
  @endsection