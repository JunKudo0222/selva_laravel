


 $('.select').attr('disabled', true);
       
       
 var $kagen = $('.kagen'); //都道府県の要素を変数に入れます。
 var $jougen = $('.jougen'); //都道府県の要素を変数に入れます。
 var kagenoriginal = $kagen.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
 var jougenoriginal = $jougen.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
 var val1;
 var kagenval;
 var jougenval;
 

function income(){
     kagenval=null;
     jougenval=null;
     $('.select').attr('disabled', false);
     
  
  
  //ajaxでのcsrfトークン送信
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  
  
  
  
  var form = new FormData();
  
  $.ajax({
      type: 'get',
      url: '/posts',
      // url: '/test',
      data: form,
      processData : false,
      contentType : false,
      
      //成功の場合、以下を行う。
      success: function(data){
          
          //選択された地方のvalueを取得し変数に入れる
         var elements=document.getElementsByName('income_type');
         
         for (  val1="", i=elements.length; i--; ) {
            if ( elements[i].checked ) {
                 val1 = elements[i].value ;

                break ;
            }
        }
        
        
       
          //削除された要素をもとに戻すため.html(kagenoriginal)を入れておく
          $kagen.html(kagenoriginal).find('option').each(function() {
              var kagenval2 = $(this).data('val'); //data-valの値を取得
            //   alert(val2);
              //valueと異なるdata-valを持つ要素を削除
              if (val1 != kagenval2) {
                  $(this).not(':first-child').remove();
              }
              $('.modori').html('選択して下さい').val("");
          });
          //削除された要素をもとに戻すため.html(kagenoriginal)を入れておく
          $jougen.html(jougenoriginal).find('option').each(function() {
              var jougenval2 = $(this).data('val'); //data-valの値を取得
            //   alert(val2);
              //valueと異なるdata-valを持つ要素を削除
              if (val1 != jougenval2) {
                  $(this).not(':first-child').remove();
              }
              $('.modori').html('選択して下さい').val("");
          });
          
          
         

  },
  
  //失敗の場合、以下を行う。
  error : function(){
      alert('失敗です。');
      console.log("XMLHttpRequest : " + XMLHttpRequest.status);
　　console.log("textStatus     : " + textStatus);
　　console.log("errorThrown    : " + errorThrown.message);
  }
});
}





function jougen(){
 
 
 //ajaxでのcsrfトークン送信
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
 
 var form = new FormData();
 
 $.ajax({
     type: 'get',
     url: '/posts',
     // url: '/test',
     data: form,
     processData : false,
     contentType : false,
     
     //成功の場合、以下を行う。
     success: function(data){
         kagenval = $('.kagen').val();
         if(jougenval&&Number(jougenval)>!Number(kagenval)){
         }
         else{

             
             //選択されたkagenのvalueを取得し変数に入れる
             kagenval = $('.kagen').val();
             
             //削除された要素をもとに戻すため.html(jougenoriginal)を入れておく
             $jougen.html(jougenoriginal).find('option').each(function() {
                 var val2 = $(this).val(); //data-valの値を取得
                 var dataval2 = $(this).data('val'); //data-valの値を取得
                 
                 //valueと異なるdata-valを持つ要素を削除
                 if (dataval2 != val1) {
                     $(this).not(':first-child').remove();
                    }
                    //valueと異なるdata-valを持つ要素を削除
                    if (Number(kagenval) >= Number(val2)) {
                        $(this).not(':first-child').remove();
                    }
                    $('.modori').html('選択して下さい').val("");
                });
                
                
                //地方側のselect要素が未選択の場合、都道府県をdisabledにする
            }
                
            

 },
 
 //失敗の場合、以下を行う。
 error : function(){
     alert('失敗です。');
     console.log("XMLHttpRequest : " + XMLHttpRequest.status);
　　console.log("textStatus     : " + textStatus);
　　console.log("errorThrown    : " + errorThrown.message);
 }
});
}









function kagen(){
 
 //ajaxでのcsrfトークン送信
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });
 
 var form = new FormData();
 
 $.ajax({
     type: 'get',
     url: '/posts',
     // url: '/test',
     data: form,
     processData : false,
     contentType : false,
     
     //成功の場合、以下を行う。
     success: function(data){
         
         jougenval = $('.jougen').val();
        if(kagenval&&Number(jougenval)>Number(kagenval)){
            
        }
         else{
         //選択されたjougenのvalueを取得し変数に入れる
        
        
         //削除された要素をもとに戻すため.html(jougenoriginal)を入れておく
         $kagen.html(kagenoriginal).find('option').each(function() {
             var val2 = $(this).val(); //data-valの値を取得
             var dataval2 = $(this).data('val'); //data-valの値を取得
             
             //valueと異なるdata-valを持つ要素を削除
             if (dataval2 != val1) {
                 $(this).not(':first-child').remove();
             }
             //valueと異なるdata-valを持つ要素を削除
             if (Number(jougenval) <= Number(val2)) {
                 $(this).not(':first-child').remove();
             }
             $('.modori').html('選択して下さい').val("");
         });
        }
         
         //地方側のselect要素が未選択の場合、都道府県をdisabledにする


 },
 
 //失敗の場合、以下を行う。
 error : function(){
     alert('失敗です。');
     console.log("XMLHttpRequest : " + XMLHttpRequest.status);
　　console.log("textStatus     : " + textStatus);
　　console.log("errorThrown    : " + errorThrown.message);
 }
});
}