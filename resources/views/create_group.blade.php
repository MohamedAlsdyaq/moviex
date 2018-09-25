@extends('layouts.app')

@section('content')

<head>
	<style type="text/css">
input[type="text"],

 select {
 border: none;
  outline: none;
  background: none;
  font-family: 'Open Sans', Helvetica, Arial, sans-serif;
  float: left;
  border-bottom: 10px;
}
select{
	margin-left: 10px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}




label {
  display: block;
  color: #d8d8d8;
  margin-bottom: 8px;
  float: left;
}


.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

 

	</style>
	<script type="text/javascript">
		$custom-file-text: (
  placeholder: (
    en: "Choose file...",
    es: "Seleccionar archivo..."
  ),
  button-label: (
    en: "Browse",
    es: "Navegar"
  )
);
	</script>
</head>
<div class="container" >
<div class="row " >
	<h3>Create a Group </h3>

<div id="create_group" style="padding-top: 1%;margin-bottom: 3%;" class="form-group  col-sm-8 col-xs-12 white_box" >

 <form enctype="multipart/form-data" action="/groups/create/store" method="post">
        {{ csrf_field() }} 
      
        
        <fieldset>
          
         
         <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Group Picture:</label>
      <div class="col-sm-10">
       <label class="custom-file">
  <input accept="image/*"  type="file" id="file" name="picture" class="custom-file-input">
  <span class="custom-file-control"></span>
</label>
      </div>
            <br>  <br><br>  <br>

         <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Name:</label>
      <div class="col-sm-10">
        <input name="name" type="text" class="form-control form-control-sm" id="smFormGroupInput" placeholder="Title of the group..">
      </div>
          <br>  <br><br>  <br>
          <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">bio:</label>
      <div class="col-sm-10">
        <input name="bio" type="text" class="form-control form-control-sm" id="smFormGroupInput" placeholder="Description of the group..">
      </div>
          <br>  <br><br>  <br>
        
        </fieldset>
        
        <fieldset>
          
      

    <label for="exampleSelect2">Group Category</label>
    <select name="group_type" style="float: left; width: 80%;"  class="form-control" id="exampleSelect2">
      <option>Movies</option>
      <option>TV</option>
     
    </select>
 
            <br>  <br>
           
          <br>
        <hr>
         <br>
          
        </fieldset>
          
        <button type="submit" class="btn btn-success btn-lg" style="float: right; margin: 4%">Create</button>
        
      </form>



</div>

</div>
</div>


@endsection()