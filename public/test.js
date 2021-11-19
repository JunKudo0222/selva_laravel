


function send1(){
    //ajaxでのcsrfトークン送信
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //アップロードファイルの入力値を取得する。
    var fileData1 = document.getElementById("file1").files[0];
    
    //フォームデータを作成する。(送信するデータ)
    var form = new FormData();
    //画像キャッシュの削除(画像URLにユニークなクエリを付与)
    var timestamp = new Date().getTime();

    //フォームデータにテキストの内容、アップロードファイルの内容を格納する。
    form.append( "file1", fileData1 );
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
            $("#main1").empty();
            $("#main1").append(data);
            $('#image1').attr('src', $('#image1').attr('src')+'?'+timestamp);
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
function send2(){
    //ajaxでのcsrfトークン送信
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //アップロードファイルの入力値を取得する。
    var fileData2 = document.getElementById("file2").files[0];
    
    //フォームデータを作成する。(送信するデータ)
    var form = new FormData();
    //画像キャッシュの削除(画像URLにユニークなクエリを付与)
    var timestamp = new Date().getTime();

    //フォームデータにテキストの内容、アップロードファイルの内容を格納する。
    
    form.append( "file2", fileData2 );
    
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
            $("#main2").empty();
            $("#main2").append(data);
            $('#image2').attr('src', $('#image2').attr('src')+'?'+timestamp);
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
function send3(){
    //ajaxでのcsrfトークン送信
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //アップロードファイルの入力値を取得する。
   
    var fileData3 = document.getElementById("file3").files[0];
    
 
    //フォームデータを作成する。(送信するデータ)
    var form = new FormData();
    //画像キャッシュの削除(画像URLにユニークなクエリを付与)
    var timestamp = new Date().getTime();

    //フォームデータにテキストの内容、アップロードファイルの内容を格納する。
    
    form.append( "file3", fileData3 );
    
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
            $("#main3").empty();
            $("#main3").append(data);
            $('#image3').attr('src', $('#image3').attr('src')+'?'+timestamp);
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
function send4(){
    //ajaxでのcsrfトークン送信
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //アップロードファイルの入力値を取得する。
    
    var fileData4 = document.getElementById("file4").files[0];
 
    //フォームデータを作成する。(送信するデータ)
    var form = new FormData();
    //画像キャッシュの削除(画像URLにユニークなクエリを付与)
    var timestamp = new Date().getTime();

    //フォームデータにテキストの内容、アップロードファイルの内容を格納する。
    
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
            $("#main4").empty();
            $("#main4").append(data);
            $('#image4').attr('src', $('#image4').attr('src')+'?'+timestamp);
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





   

       $('.children').attr('disabled', true);
       
       
       var $children = $('.children'); //都道府県の要素を変数に入れます。
       var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
       
    function change(){
           
           $('.children').attr('disabled', false);
           
        
        
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
                    $('.modori').html('選択して下さい').val("");
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

 
        







var allow_exts = new Array('jpg', 'jpeg', 'png','gif');
// changeイベントで呼び出す関数
function handleFileSelect1(){
    const sizeLimit = 1024 * 1024 * 10;　// 制限サイズ
    const fileInput = document.getElementById('file1'); // input要素
    const files = fileInput.files;
    for (let i = 0; i < files.length; i++) {
        if (files[i].size > sizeLimit) {
            // ファイルサイズが制限以上
            alert('ファイルサイズは10MB以下にしてください'); // エラーメッセージを表示
            fileInput.value = ''; // inputの中身をリセット
            return; // この時点で処理を終了する
        }
        
        if (!checkExt(files[i].name)) {
            alert(files[i].name+'はアップロードできません');
            fileInput.value = ''; // inputの中身をリセット
            return false;
        }
    }
        
    $('#button1').attr('disabled', false);
//チェックを通ったらtrueを返す
return true;
}
//アップロード予定のファイル名の拡張子が許可されているか確認する関数
function checkExt(filename)
{
	//比較のため小文字にする
	var ext = getExt(filename).toLowerCase();
	//許可する拡張子の一覧(allow_exts)から対象の拡張子があるか確認する
	if (allow_exts.indexOf(ext) === -1) return false;
	return true;
}
//ファイル名から拡張子を取得する関数
function getExt(filename)
{
	var pos = filename.lastIndexOf('.');
	if (pos === -1) return '';
	return filename.slice(pos + 1);
}

// changeイベントで呼び出す関数
function handleFileSelect2(){
    const sizeLimit = 1024 * 1024 * 10;　// 制限サイズ
    const fileInput = document.getElementById('file2'); // input要素
  const files = fileInput.files;
  for (let i = 0; i < files.length; i++) {
    if (files[i].size > sizeLimit) {
      // ファイルサイズが制限以上
      alert('ファイルサイズは10MB以下にしてください'); // エラーメッセージを表示
      fileInput.value = ''; // inputの中身をリセット
      return; // この時点で処理を終了する
    }
    if (!checkExt(files[i].name)) {
        alert(files[i].name+'はアップロードできません');
        fileInput.value = ''; // inputの中身をリセット
        return false;
    }
  }
  $('#button2').attr('disabled', false);
//チェックを通ったらtrueを返す
return true;
}
// changeイベントで呼び出す関数
function handleFileSelect3(){
    const sizeLimit = 1024 * 1024 * 10;　// 制限サイズ
    const fileInput = document.getElementById('file3'); // input要素
  const files = fileInput.files;
  for (let i = 0; i < files.length; i++) {
    if (files[i].size > sizeLimit) {
      // ファイルサイズが制限以上
      alert('ファイルサイズは10MB以下にしてください'); // エラーメッセージを表示
      fileInput.value = ''; // inputの中身をリセット
      return; // この時点で処理を終了する
    }
    if (!checkExt(files[i].name)) {
        alert(files[i].name+'はアップロードできません');
        fileInput.value = ''; // inputの中身をリセット
        return false;
    }
  }
  $('#button3').attr('disabled', false);
//チェックを通ったらtrueを返す
return true;
}
// changeイベントで呼び出す関数
function handleFileSelect4(){
    const sizeLimit = 1024 * 1024 * 10;　// 制限サイズ
    const fileInput = document.getElementById('file4'); // input要素
  const files = fileInput.files;
  for (let i = 0; i < files.length; i++) {
    if (files[i].size > sizeLimit) {
      // ファイルサイズが制限以上
      alert('ファイルサイズは10MB以下にしてください'); // エラーメッセージを表示
      fileInput.value = ''; // inputの中身をリセット
      return; // この時点で処理を終了する
    }
    if (!checkExt(files[i].name)) {
        alert(files[i].name+'はアップロードできません');
        fileInput.value = ''; // inputの中身をリセット
        return false;
    }
  }
  $('#button4').attr('disabled', false);
//チェックを通ったらtrueを返す
return true;
}


$('#button1').attr('disabled', true);
$('#button2').attr('disabled', true);
$('#button3').attr('disabled', true);
$('#button4').attr('disabled', true);
$('#main1').on('DOMSubtreeModified propertychange',function(){
    $('#button1').attr('disabled', true);
    
}
)
$('#main2').on('DOMSubtreeModified propertychange',function(){
    $('#button2').attr('disabled', true);
    
}
)
$('#main3').on('DOMSubtreeModified propertychange',function(){
    $('#button3').attr('disabled', true);
    
}
)
$('#main4').on('DOMSubtreeModified propertychange',function(){
    $('#button4').attr('disabled', true);
    
}
)
