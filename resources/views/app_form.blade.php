<form method="POST" action="{{ route('update-env') }}">
    @csrf
    <label for="APP_NAME">App Name:</label>
    <input type="text" name="APP_NAME" value="{{ env('APP_NAME') }}">
    <br>
    <label for="APP_ENV">App Environment:</label>
    <input type="text" name="APP_ENV" value="{{ env('APP_ENV') }}">
    <br>
    <button type="submit">Update</button>
  </form>
