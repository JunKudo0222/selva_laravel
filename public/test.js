
function send(){
 
    //ajaxでのcsrfトークン送信
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    
    //テキストの入力値を取得する。
    
 
    //アップロードファイルの入力値を取得する。
    var fileData1 = document.getElementById("file1").files[0];
    var fileData2 = document.getElementById("file2").files[0];
    var fileData3 = document.getElementById("file3").files[0];
    var fileData4 = document.getElementById("file4").files[0];
 
    //フォームデータを作成する。(送信するデータ)
    var form = new FormData();
    

 
    //フォームデータにテキストの内容、アップロードファイルの内容を格納する。
    
    form.append( "file1", fileData1 );
    form.append( "file2", fileData2 );
    form.append( "file3", fileData3 );
    form.append( "file4", fileData4 );
    
    //ポスト送信する。
    $.ajax({
        type: 'post',
        url: '/create/create',
        // url: '/test',
        data: form,
        processData : false,
        contentType : false,
        
        //成功の場合、以下を行う。
        success: function(data){
            $("#main").append(data);
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





var $children = $('.children'); //都道府県の要素を変数に入れます。
var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく

function change(){
    
    //ajaxでのcsrfトークン送信
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    
    
    
    var form = new FormData();
    
    $.ajax({
        type: 'get',
        url: '/create',
        // url: '/test',
        data: form,
        processData : false,
        contentType : false,
        
        //成功の場合、以下を行う。
        success: function(data){
  //選択された地方のvalueを取得し変数に入れる
  var val1 = $('.parent').val();
 
  //削除された要素をもとに戻すため.html(original)を入れておく
  $children.html(original).find('option').each(function() {
    var val2 = $(this).data('val'); //data-valの値を取得
 
    //valueと異なるdata-valを持つ要素を削除
    if (val1 != val2) {
      $(this).not(':first-child').remove();
    }
 
  });
 
  //地方側のselect要素が未選択の場合、都道府県をdisabledにする
  if ($('.parent').val() == "") {
    $children.attr('disabled', 'disabled');
  } else {
    $children.removeAttr('disabled');
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

 
        
    





