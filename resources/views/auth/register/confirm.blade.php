<div class="card-text">
    <h1>会員情報確認画面</h1>
    <form method="POST" action="{{ route('user.register_register') }}">
        @csrf
        <div class="md-form">
            <label for="name">姓</label>
            {{ $input["name_sei"] }}
            <input class="form-control" type="hidden" id="name_sei" name="name_sei" required value="{{ $input['name_sei'] }}">
        </div>
        <div class="md-form">
            <label for="name">名</label>
            {{ $input["name_mei"] }}
            <input class="form-control" type="hidden" id="name_mei" name="name_mei" required value="{{ $input['name_mei'] }}">
        </div>

        <div class="md-form">
            <label for="gender_id">性別</label>
            @if((int)$input["gender_id"]==1)
            男性 
            @else
            女性
            @endif
            <input class="form-control" type="hidden" id="gender_id" name="gender_id" required value="{{ $input['gender_id'] }}">
        </div>


        
        
        
        <div class="md-form">
            <label for="nickname">住所</label>
            {{ $input["nickname"] }}
            <input class="form-control" type="hidden" id="nickname" name="nickname" required value="{{ $input['nickname'] }}">
        </div>

        <div class="md-form">
            <label for="password">パスワード</label>
            セキュリティのため非表示
            <input class="form-control" type="hidden" id="password" name="password" required value="{{ $input['password'] }}">
        </div>

        <div class="md-form">
            <label for="name">メールアドレス</label>
            {{ $input["email"] }}
            <input class="form-control" type="hidden" id="email" name="email" required value="{{ $input['email'] }}">
        </div>


        <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit" name="back">前に戻る</button>
        <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">登録完了</button>
    </form>
</div>