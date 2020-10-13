$('#questions').on('click','.pagination a', function (e) {
    e.preventDefault();
    var url=$(this).attr('href').split('page=')[1];
    $.ajax({
        url: "questions?page="+url,
        success: function (res) {

            $('#questions').html(res);
        },
        error: function (err) {
            console.log(err);
        }
    })
});

$('#photos').on('click','.pagination a', function (e) {
    e.preventDefault();
    var url=$(this).attr('href').split('page=')[1];
    $.ajax({
        url: "image?page="+url,
        success: function (res) {

            $('#photos').html(res);
        },
        error: function (err) {
            console.log(err);
        }
    })
});
function proveracontact() {
    var x=document.contactform;

    var greske=new Array();

    var name= x.name.value;
    var email= x.email.value;
    var subject= x.subject.value;
    var message=x.message.value;

   var rename=/[\w]{3,30}/;
   var reemail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   var resubject=/^\w+(\s+\w+)*$/;
  

   if(!name.match(rename)){
       greske.push("Name myst be between 3 and 30 caracters");
   }
   if(!email.match(reemail)){
       greske.push("Mail must be valid");
   }
   if(!subject.match(resubject)){
       greske.push('Subject fild is invalid(only leters)');
   }
   if(message == ""){
       greske.push('Message field is required');
   }

   if(greske.length == 0){
       return true;
   }
   else {
       alert(greske);
       return false;
   }

}
function anketa() {

   var ocena=$('input[name=radio1]:checked', '#anketa').val()
   var imgid=$('#img_id').val();
    if(ocena !== undefined){
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
          method: "post",
          url: baseUrl  + "/vote",
          data:{ocena:ocena, imgid:imgid},
           success: function (res) {
               console.log(res);
               if(res == 0){
                   alert("You have alredy voted");
               }
               else{

               $('#rating').text(res);
           }}
       });
    }
    else alert("please select");
}

function like() {
    var imgid=$('#img_id').val();
    brojlajkova++;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "post",
        url: baseUrl  + "/user/like",
        data:{imgid:imgid},
        success: function (res) {
            if(res == 1){

                $('#imglikes').html('<button class="btn btn-default" onclick="unlike()">Unlike</button>');
                $('#numberoflikes').text(brojlajkova);
            }
            else{
                alert('try again later');
            }
            }
    });
}

function unlike() {
    var imgid=$('#img_id').val();
    brojlajkova--;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "post",
        url: baseUrl  + "/user/unlike",
        data:{imgid:imgid},
        success: function (res) {
            if(res == 1){

                $('#imglikes').html('<button class="btn btn-default" onclick="like()">Like </button>');
                $('#numberoflikes').text(brojlajkova);
            }
            else{
                alert('try again later');
            }
        }
    });
}