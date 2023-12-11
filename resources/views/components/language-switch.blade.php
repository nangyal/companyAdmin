<form action="{{ route('language.switch') }}" method="post">
    @csrf
    <select name="language" onChange="this.form.submit()">
        <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
        <option value="hu" {{ app()->getLocale() === 'hu' ? 'selected' : '' }}>Magyar</option>
    </select>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;
