<form method="POST" id="formValoracio" action="{{route('propostesValoracio',$proposta->id)}}">
    @csrf
    @method('put')
  <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5">
        <label for="radio1">★</label>
    <input id="radio2" type="radio" name="estrellas" value="4">
        <label for="radio2">★</label>
    <input id="radio3" type="radio" name="estrellas" value="3">
        <label for="radio3">★</label>
    <input id="radio4" type="radio" name="estrellas" value="2">
        <label for="radio4">★</label>
    <input id="radio5" type="radio" name="estrellas" value="1">
        <label for="radio5">★</label>
  </p>
</form>
<style>
    label{
        color:grey;
    }

    input[type = "radio"]{
        display:none;
    }

    .clasificacion{
      direction: rtl;
      unicode-bidi: bidi-override;
  }

    label:hover{
      color:orange;
    }

    label:hover ~ label{
        color:orange;
    }

    input[type = "radio"]:checked ~ label{
        color:orange;
    }

    #form {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

#form p {
  text-align: center;
}

#form label {
  font-size: 20px;
}


</style>