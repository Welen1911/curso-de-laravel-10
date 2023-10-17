@csrf
<input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}"><br>
<textarea name="body" id="" cols="30" rows="10" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea>
