<style>
    .thumbnail{
        width:100px;
        height:100px;
    }
</style>

<!DOCTYPE html>
                        <head>
                            <title>test</title>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                        </head>
                        <body>
                    
                            <!-- サーバへ送信する内容を入力する。 -->
                            
                            ファイル1：<input type="file" id="file1"><br/>
                            ファイル2：<input type="file" id="file2"><br/>
                            ファイル3：<input type="file" id="file3"><br/>
                            ファイル4：<input type="file" id="file4"><br/>
                            <button type="submit" onclick="send();">送信</button>
                            
                            <!-- サーバから受けた内容を表示する。 -->
                            <div id="main">
                                
                                <img class="thumbnail" src="{{ url('storage/image1.jpeg') }}">
                                <img class="thumbnail" src="{{ url('storage/image2.jpeg') }}">
                                <img class="thumbnail" src="{{ url('storage/image3.jpeg') }}">
                                <img class="thumbnail" src="{{ url('storage/image4.jpeg') }}">
                                </div>
                            
                            
                            <!-- JavaScripts -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
                            <script src="{{ url('test.js') }}"></script>        
                        </body>

                
                



