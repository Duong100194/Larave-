<form action='{{ route('update_user') }}' method='post'>
    {{ csrf_field() }}
{{--    <input type='hidden' name='id' value='{{ $article->id }}'><br>--}}
{{--    ユーザーID：{{ $article->user_id }}<br>--}}
{{--    タイトル：<input type='text' name='title' value='{{ $article->title }}'><br>--}}
{{--    内容：<input type='text' name='content' value='{{ $article->content }}'><br>--}}
{{--    <input type='submit' value='投稿'>--}}
    <table>
        <h1>Add User</h1>
        <td>ID<span class="error">(必須)</span></td>
        <tr>
            <td><input type="hidden" name='id' value="{{ $user->id }}"/></td>
            <div>
                @error('id')
                <span class="error"role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </tr>
        <td>User<span class="error">(必須)</span></td>
        <tr>
            <td><input type="text" name='user'value="{{ $user->user }}"/></td>
            <div>
                @error('user')
                <span class="error"role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </tr>
        <tr>
            <td>UserName<span class="error">(必須)</span></td>
        </tr>
        <td><input type="text" name='username'value="{{ $user->username }}"/></td>
        <div>
            @error('username')
            <span class="error"role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <tr>
            <td>Email<span class="error">(必須)</span></tr></td>
        </tr>
        <td><input type="text" name='email'value="{{ $user->email }}"/></td>
        <div>
            @error('email')
            <span class="error"role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <tr>
            <td>Address</td>
        </tr>
        <td><input type="text" name='address'value="{{ $user->address }}"/></td>
        </tr>

        <tr>
            <td colspan = '1'>
                <input type = 'submit' value = "Update"/>
            </td>
        </tr>
    </table>
</form>

</div>

</form>
