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
  }
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
  }
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
  }
}