@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libertinus+Serif:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">＊</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <input type="text" name="first_name" placeholder="例）山田" value="{{ old('first_name') }}" />
                    <input type="text" name="last_name" placeholder="例）太郎" value="{{ old('last_name') }}" />
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">＊</span>
            </div>
            <div class="form__group-content">
                <div class="form__radio--gender">
                    <label>男性<input type="radio" class="gender" name="gender" value="男性" checked /></label>
                    <label>女性<input type="radio" class="gender" name="gender" value="女性"/></label>
                    <label>その他<input type="radio" class="gender" name="gender" value="その他" /></label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">＊</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--email">
                    <input type="text" name="email" placeholder="例）test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">＊</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input type="text" name="tel1" placeholder="例）080" value="{{ old('tel1')}}" />
                    <label>- <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                    <label>- <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
                </div>
                <div class="form__error">
                    @error('tel1','tel2','tel3')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">＊</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--address">
                    <input type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷１−２−３" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--building">
                    <input type="text" name="building" placeholder="例）千駄ヶ谷マンション１０１" value="{{ old('building') }}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">＊</span>
            </div>
            <div class="form__group-content">
                <div class="form__select">
                    <select class="type__of--content" name="content" value="{{ old('content') }}" />
                        <option name="選択してください" value="{{ old('content')}}" />選択してください</option>
                        <option name="商品のお届けについて" value="{{ old('content') }}/">1. 商品のお届けについて</option>
                        <option value="商品の交換について">2. 商品の交換について</option>
                        <option value="商品トラブル">3. 商品トラブル</option>
                        <option value="ショップへのお問い合わせ">4. ショップへのお問い合わせ</option>
                        <option value="その他">5. その他</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('content')
                    {{ $message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの内容</span>
                <span class="form__label--required">＊</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}"></textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button--submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection