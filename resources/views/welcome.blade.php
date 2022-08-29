<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<link rel="stylesheet" href="../css/app.css"/> 
<meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
  
    <body>
      <div class="container">
     </div>
     <button id="buttonAddComment" class="button" type="button">Добавить еще</button>
     <button id="buttonAddForm" class="button" type="button">Добавить комментарий</button>
     
     <div class="popup">

<div class="popup__registration">
    <div class="popup__content">
    
      <img src="{{ asset('images/close.svg') }}" alt="" class="popup__close">
      <h3 class="popup__title">Комментарий</h3>
      <form id="form" class="popup__form-registration">
        <h4 class="popup__title-input">Имя</h4>
        <span class="error"></span>
        <input type="name" id="name" name="name" placeholder="Введите имя" class="popup__input" >
        <span class="error"></span>
        <h4 class="popup__title-input">Комментарий</h4>
        <input type="text" id="comment" name="comment" placeholder="Введите текст"  class="popup__input password" >
        <span  id="error" class="error"></span>
       <button type="button" class="popup__button-registration" id="button" name="button" class="button popup__button-registration">Отправить</button>
      
      </form>
      
    </div>
</div>
  </div>
 


  <div  class="modal">
    <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-body">    
          <p>Больше нет коментариев</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
  const container = document.querySelector('.container');
$.ajax({

   url: "{{ route('company.index') }}",
   type: 'GET',
   cache: false,
   data: {},

   dataType: "json",
   success: function (data) {

      for (let i = 0; i < 3; i += 1) {
         renderCard(data[i]);
      }
   }

});

function renderCard(data) {

   $(".container").append('<div class="comment"><p class="comment__text">' + data.comment + '</p><p class="comment__name"><span class="text-bold">Пользователь: </span>' + data.name + '</p></div> ');
}

$("#buttonAddForm").on("click", function () {
   $(".popup").toggle();
   $("body").addClass("dark");
   $("#button").on("click", function () {
      var name = $("#name").val().trim();
      var comment = $("#comment").val().trim();
      if (name == "") {
         $("#error").text("Введите имя");
         return false;
      } else if (comment == "") {
         $("#error").text("Введите телефон");
         return false;
      }
      $("#error").text("");

      $.ajax({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: "{{ route('company.store') }}",
         type: 'POST',
         cache: false,
         data: {
            'name': name,
            'comment': comment
         },

         dataType: "json",
         beforeSend: function () {

            $("#button").prop("disabled", true);

         },
         complete: function () {
            $("#form").trigger("reset");
            $(".popup").hide();
         },

      });
   });
});


$("#buttonAddComment").on("click", function () {
   $.ajax({

      url: "{{ route('company.index') }}",
      type: 'GET',
      cache: false,
      data: {},

      dataType: "json",

      success: function (data) {
         let conteinerLenght = container.children.length;
         if (data.length < conteinerLenght + 3) {
            $(".modal").toggle();
            setTimeout(() => {
               $(".modal").hide();
            }, 2000);
            console.log("больше нет коментариев")
         } else {
            for (let i = conteinerLenght; i < conteinerLenght + 3; i += 1) {
               renderCard(data[i]);
            }
         }
      }
   });
});
$(".popup__close").on("click", function () {
   $(".popup").hide();
   $('body').removeClass('dark')
});
</script>
    </body>
</html>
