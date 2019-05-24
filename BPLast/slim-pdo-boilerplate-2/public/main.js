var userIDF = null ;
var userNameF = null;

var tryis = $("#templateID").text()
const views = {
  basedonVar: [tryis],
  login: ['#loginFormTemplate'],
  register: ['#registerTemplate'],
  entryView: ['#inloggedAllEntryes'],
  singleEntry: ["#singleentry"],
  AddEntryTemplate:["#AddEntryTemplate"],
  uppDateE: ["#uppdateEntry"]
}
//Views
function renderView(view) {
  const target = document.querySelector('main')
  target.innerHTML = ''
  view.forEach(template => {
    const templateMarkup = document.querySelector(template).innerHTML
    const div = document.createElement('div')
    div.innerHTML = templateMarkup
    target.append(div)
  })
}
console.log(views);
if(tryis==views.entryView){
  loadEntryes();
}

console.log(tryis);
renderView(views.basedonVar);

function allUsers(){
$.ajax({
  url: '/api/user',
  dataType: 'json',
  success: function(data1) {
  let person = (data1);
  console.log(person);
  person.forEach(data => {
    console.log(data.username);
  });
  }
});
}



//L8ter Nav
$(document).on("click","#registerButton",function(e){
  e.preventDefault();
  renderView(views.register);
})
$(document).on("click","#loginButton",function(e){
  e.preventDefault();
  renderView(views.login); 
  
});
$(document).on("click","#homeBTN",function(e){
  e.preventDefault();
  loadEntryes();
})
$(document).on("click","#LogOut",function(e){
  e.preventDefault();
  $.ajax({
    url: '/api/logout',
    dataType: 'json',
    success: function(data) {
    console.log(data)
    window.location.reload()
   
    }
  });
});
//addEntry
$(function(){
  $(document).on("click","#addEntry",function(e){
    e.preventDefault();
    renderView(views.AddEntryTemplate);
  })
})
//ShowMyEntr
$(function(){
  $(document).on("click","#myEntr",function(e){
    e.preventDefault();
    itsMineEnt();
  });
    
})
//Login DontForgetError
$(document).on("click","#login",(function(event) {
  event.preventDefault();
  var $log = $("#logName").val()
  var $pass = $("#logPassword").val();
  var customer = {username:$log,password:$pass};
  $.ajax({
   contentType:"application/json",
   type: 'POST',
   url: '/api/loginuser',
   dataType: 'json',
   data: JSON.stringify(customer),
   success: function( data) {

     if(data == false){
       //ErrorCodeIfneeded
       console.log("troubles");
     }
     else {
     console.log("LoginSucces");
     window.location.reload();
     loadEntryes();
    }
   },
   error: function() {

     console.log("Why I am here");
   }
 });
}));
//register
$(document).on("click","#reg",(function(event) {
  event.preventDefault();
  var $log = $("#regName").val()
  var $pass = $("#regPassword").val();
  var customer = {username:$log,password:$pass};
  $.ajax({
   contentType:"application/json",
   type: 'POST',
   url: '/api/user/reg',
   dataType: 'json',
   data: JSON.stringify(customer),
   success: function() {
     $("#RegMessage").text("Registered Succesfully")
     console.log("RegSucces");
   },
   error: function() {
     alert("SomethingWentWrong Check")
     console.log("RegisterDidntGO");
    
   }
 });
}));
//Search for entryies
$(document).on("click","#Search",(function(e){
  e.preventDefault(true);
  var $searchQ = "%"+ $("#uTitle").val() + "%";
  console.log($searchQ);
  $.ajax({
    url:"/api/entry/find/" + $searchQ,
    dataType: "json",
    success: function(data){
      console.log(data)
      let htCode = "";
      data.forEach(data => {
      htCode += "<tr><td><a class=seBTN href='localhost:8080'>"+data.title+"</a></td><td style=visibility:hidden; id=getEntryID>"+data.entryID+"</td></tr>"
    });
   $("#entryBody").html(htCode);
    }
  })

}));
//create
$(document).on("click","#createEntry",function(event){
    event.preventDefault(true);
    var $title = $("#eTitle").val();
    var $content = $("#eContent").val();
    var entry = {title:$title,content:$content};
    console.log(entry);
    $.ajax({
      contentType:"application/json",
      type: 'POST',
      url: '/api/entry/add',
      data: JSON.stringify(entry),
      success: function(data){
        console.log(data);
      renderView(views.entryView)
      loadEntryes();
      },
      error: function(){
        alert("SomethingsWrong");
      }
      
    })
  });
//UpdateView
$(document).on("click","#UppdateMyEn",function(event){
  event.preventDefault();
  let ID = $(this).parent().parent().find("#getEntryID").text();
  $.ajax({
    url: '/api/entries/' + ID,
    dataType: 'json',
    success: function(data){
      renderView(views.uppDateE);
      console.log(data.entryID);
      $("#thisID").html(data.entryID);
      $("#uTitle").val(data.title);
      $("#uContent").val(data.content);
    
    }
  })
})
$(document).on("click","#updateEntry",function(event){
  event.preventDefault();
  let $entryQD = $("#thisID").text();
  let $uQTitle = $("#uTitle").val();
  let $uQContent = $("#uContent").val();
  let $entryParam = {title:$uQTitle, content:$uQContent}
  console.log($entryQD + "lol")
  $.ajax({
     contentType: "application/json",
     type: 'POST',
     url: '/api/entry/update/'+$entryQD,
     data: JSON.stringify($entryParam),
     dataType: "json", 
     success: function(data){
       renderView(views.basedonVar);
       itsMineEnt();
     }
  })

})
$(document).on("click","#deleteEnt", function(event){
  event.preventDefault();
  let ID = $(this).parent().parent().find("#getEntryID").text();
  var r = confirm("Press a button!");
  if (r == true) {
    $.ajax({
      url:"/api/entry/delete/"+ID,
      method:"DELETE",
      dataType: "json",
      success: function(){
      alert("Deleted");
      renderView(views.basedonVar);
      itsMineEnt();
      }

    })
  } else {
    alert("Watch out, dont push if not needed");
  }
})
//SingleEntry   
 $(function(){
  $(document).on("click",".seBTN",function(e){
    e.preventDefault();
    let ID = $(this).parent().parent().find("#getEntryID").text();
    getSingleEntry(ID);
  })
 })
$(document).on("click","#createComment",function(e){
  e.preventDefault();
  console.log($("#eID").text());
  var $entryID = $("#eID").text();
  var $content = $("#eContent").val();
  var comment = {entryID:$entryID,content:$content};
  var post = "post";
  manipulateComment(comment.entryID,comment,post);
})
//Choose Coment to UPPDATE
$(document).on("click",".uCn", function(e){
  e.preventDefault();
  let comID = $(this).parent().parent().find("#commentID").text();
  console.log("comDel");
  console.log(comID);
 $("#cmID").remove();

      $.ajax({
        url: "api/scomment/" + comID,
        dataType: 'json',
        success: function(data){
          $("#createComment").remove();
          $("#updComment").remove();
          $("#CommentForm").append("<input type=submit id=updComment value=Update comment>");
          $("#CommentForm").append("<p id=cmID style=visibility:hidden>"+comID+"</p>")
          $("#eContent").val(data.content);
        }
      })
})
//THESE TWO TOGEHTER
$(document).on("click","#updComment",function(e){
  e.preventDefault();
  $cmID = $("#cmID").text();
  $content = $("#eContent").val();
  $newComment = {commentID:$cmID,content:$content};
  $method = "edit";
  console.log($newComment);
  var $entryID = $("#eID").text();
  manipulateComment($entryID,$newComment,$method);



})

$(document).on("click","#comDel",function(e){
  e.preventDefault();
  let comID = $(this).parent().parent().find("#commentID").text();
  var $entryID = $("#eID").text();
  var r = confirm("Sure you want to Delete?");
  if (r == true) {
    $.ajax({
      url:"/api/dcomment/"+comID,
      method:"DELETE",
      dataType: "json",
      success: function(){
      getSingleEntry($entryID);
      }

    })
  } else {
    alert("Watch out, dont push if not needed");
  }

})

//SimplePagening Page#1
$(document).on("click","#page1",function(e){
  e.preventDefault();
  loadEntryes();
})



$(document).on("click","#page2",function(e){
  e.preventDefault();
  $.ajax({
    url: '/api/entries',
    dataType: 'json',
    success: function(data) {
     console.log(data)
     let htCode= "";
     for (i = 19; i < data.length; i++) {
      htCode += "<tr><td><a class=seBTN href='test'>"+data[i].title+"</a>"+" <br>by: "+data[i].username+"</td><td style=visibility:hidden; id=getEntryID>"+data[i].entryID+"</td></tr>";
     };
    $("#entryBody").html(htCode);
    }
})
})


function loadEntryes(){
  renderView(views.entryView);
  $.ajax({
    url: '/api/entries',
    dataType: 'json',
    success: function(data) {
    let htCode = "";
    console.log(data);
    if(data.length<=20){
      $("#page1").addClass("isDisabled");
      for (i = 0; i < data.length; i++) {
        htCode += "<tr><td><a class=seBTN href='test'>"+data[i].title+"</a>"+" <br>by: "+data[i].username+"</td><td style=visibility:hidden; id=getEntryID>"+data[i].entryID+"</td></tr>";
      };
    }
    else{
      $("#pageNum").append("<a id=page2 href=#>2</a>");
      for (i = 0; i < 20; i++) {
        htCode += "<tr><td><a class=seBTN href='test'>"+data[i].title+"</a>"+" <br>by: "+data[i].username+"</td><td style=visibility:hidden; id=getEntryID>"+data[i].entryID+"</td></tr>";
      };
    }
   $("#entryBody").html(htCode);
}
  });
}
//MyEntryies
function itsMineEnt(){
  let meCode = "";
  $("#pageNum").addClass("hidden");
  $.ajax({
    url: "/api/entry/mine",
    dataType: "json",
    success: function(aEnt){
      $("#myEntr").remove();
      $("#someNav").prepend("<button id=homeBTN class=navbar-brand>home</button>");
      aEnt.forEach(data => {
      meCode += "<tr><td><a class=seBTN href='#'>"+data.title+"</a></td><td style=visibility:hidden; id=getEntryID>"+data.entryID+"</td><td><button id=UppdateMyEn>Change Entry</button><button id=deleteEnt>Delete</button></tr>"
      });
      $("#entryBody").html(meCode);
    }
  })
}

function getSingleEntry(ID){
  $.ajax({
    url: '/api/entries/'+ID,
    dataType: 'json',
    success: function(entry){
      console.log(entry);
      renderView(views.singleEntry);
      $("#eID").html(entry.entryID);
      $("#seTitle").html(entry.title);
      $("#eECID").html(entry.content);
      getComments(ID);
    }
  })
}

//uCom - uppdateBtn comDel -delete button One Parent for ID #commentID
function getComments(ID){
  $.ajax({
    url:'/api/comments/' + ID,
    dataType: "json",
    success: function(commentData){
    let $uName = $("#UserName").text();
      let commentCode="";
      commentData.forEach(data=> {
      commentCode+= "<tr><td>By:" + data.username + "</td><td>" + data.content + "</td><td id=commentID style=visibility:hidden>"+ data.commentID + "</td>";
      if(data.username == $uName){
        commentCode += "<td><button class=uCn>uCom</button><button id=comDel>DeleteComment</button></td></tr>";
      }
      else {
        commentCode +="</tr>";
      };
      })
      $("#CommentSection").html(commentCode);
      
    }
  })
}


function manipulateComment($eID,$obj,$method){
  $.ajax({
    contentType:"application/json",
    type: 'POST',
    url: '/api/comment/'+$method,
    data: JSON.stringify($obj),
    success: function(){
      getSingleEntry($eID);
      console.log("success");
    },
    error: function(){
      alert("SomethingsWrong");
    }
    
  })
}