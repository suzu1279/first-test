<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libertinus+Serif:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
                    FashionablyLate
                </a>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/login">logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="index-form__content">
        <div class="index-form__heading">
            <h2>Admin</h2>
        </div>
        <form action="find" method="post">
            @csrf
            <div class="search-form">
                <div class="search-form__input">
                    <input type="text" name="text" placeholder="名前やメールアドレスを入力してください" />
                </div>
                <div class="search-form__gender">
                    <select name="gender">
                        <option value="性別">性別</option>
                        <option value="男性">男性</option>
                        <option value="女性">女性</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="search-form__content">
                    <select class="type__of--content" name="content" value="{{ old('content') }}" />
                        <option value="お問い合わせの種類" >お問い合わせの種類</option>
                        <option value="商品のお届けについて" >1. 商品のお届けについて</option>
                        <option value="商品の交換について">2. 商品の交換について</option>
                        <option value="商品トラブル">3. 商品トラブル</option>
                        <option value="ショップへのお問い合わせ">4. ショップへのお問い合わせ</option>
                        <option value="その他">5. その他</option>
                    </select>
                </div>
                <div class="search-form__date">
                    <input type="date" name="date">
                </div>
                <button class="search-form__button" type="submit">検索</button>
                <div class="search-form__reset">
                    <input type="reset" value="リセット">
                </div>
            </div>
        </form>
        <div>
            <div class="button">
                <div class="export-btn">
                    <button class="export">エクスポート</button>
                </div>
            </div>
            <div class="pagination">
                {{ $contacts ->links()}}
            </div>

        </div>
        <div class="contact-table">
            <table class="contact-table__inner">
                <tr class="contact-table__row">
                    <th class="contact-table__header">
                        お名前
                    </th>
                    <th class="contact-table__header">
                        性別
                    </th>
                    <th class="contact-table__header">
                        メールアドレス
                    </th>
                    <th class="contact-table__header">
                        お問い合わせの種類
                    </th>
                    <th class="contact-table__header">
                    </th>
                </tr>
                @foreach ($contacts as $contact)
                <tr class="contact-table__data">
                    <td class="name">
                        {{ $contact->name}}
                    </td>
                    <td class="gender">
                        {{ $contact->gender}}
                    </td>
                    <td class="email">
                        {{ $contact->email}}
                    </td>
                    <td class="detail">
                        {{ $contact->detail}}
                    </td>
                    <td class="detail-button">
                        <button wire:click="openModal()" type="button" class="detail">詳細</button></td>
                        
                        <div class="modal-wrapper">
                            <div class="modal-window">
                                <button wire:click="closeModal()" type="button" class="modal-close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <table class="modal-content">
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">お名前</th>
                                        <td class="modal-data">{{ $contact['name'] }}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">性別</th>
                                        <td class="modal-data">{{ $contact[ 'gender']}}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">メールアドレス</th>
                                        <td class="modal-data">{{ $contact['email']}}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">電話番号</th>
                                        <td class="modal-data">{{ $contact['tel'] }}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">住所</th>
                                        <td class="modal-data">{{ $contact['address']}}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">建物名</th>
                                        <td class="modal-data">{{ $contact['building']}}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">お問い合わせの種類</th>
                                        <td class="modal-data">{{ $contact['detail']}}</td>
                                    </tr>
                                    <tr class="modal-inner">
                                        <th class="modal-ttl">お問い合わせ内容</th>
                                        <td class="modal-data">{{ $contact['content']}}</td>
                                    </tr>
                                </table>
                                <form class="delete-form" action="/delete" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $contact['id'] }}"/>
                                    <button class="delete-btn">削除</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            
        </div>
    </div>
    @livewireScripts
</body>
</html>