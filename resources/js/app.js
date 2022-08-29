require('./bootstrap');

const container= document.querySelector('.container');
   $.ajax({
 
    url:"{{ route('company.index') }}",
    type:'GET',
    cache:false,
    data:{},
   
dataType: "json",
    beforeSend: function(){
    
        
        
    },
    success:function(data){
     
  for (let i = 0; i < 3; i += 1) {

    console.log(data[i]);
    renderCard(data[i]);
   }
}
    
});
function renderCard(data){
  
 $(".container").append('<div class="comment"><p class="comment__text">'+data.comment+'</p><p class="comment__name"><span class="text-bold">Пользователь:</span>'+data.name+'</p></div> ');
 }
   $("#button").on("click",function(){
    var name=$("#name").val().trim();
    var comment=$("#comment").val().trim();


    
   
if(name == ""){
    $("#error").text("Введите имя");
    return false;
}
else if(comment == ""){
    $("#error").text("Введите телефон");
    return false;
}
$("#error").text("");


       
$.ajax({
  headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    url:"{{ route('company.store') }}",
    type:'POST',
    cache:false,
    data:{'name':name,'comment':comment},
   
dataType: "json",
    beforeSend: function(){
    
        $("#button").prop("disabled",true);
        
    },
    
});
});

$("#buttonAddComment").on("click",function(){
  $.ajax({
 
 url:"{{ route('company.index') }}",
 type:'GET',
 cache:false,
 data:{},

dataType: "json",

success:function(data){
  let conteinerLenght=container.children.length;
  if(data.length < conteinerLenght+3){
    $(".modal").toggle();
        setTimeout(() => {
            $(".modal").hide();
        }, 2000);
    console.log("больше нет коментариев")
  }else{
    for (let i = conteinerLenght; i < conteinerLenght+3; i += 1) {
console.log(data.length);

 console.log(data[i]);
 renderCard(data[i]);

}}

}
 
});
});
