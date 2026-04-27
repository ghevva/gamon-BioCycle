<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
</head>
<body>

    <h1>Edit Booking</h1>

    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Jenis:</label><br>
        <select name="type">
            <option value="minyak" {{ $booking->type == 'minyak' ? 'selected' : '' }}>Minyak Jelantah</option>
            <option value="plastik" {{ $booking->type == 'plastik' ? 'selected' : '' }}>Sampah Plastik</option>
        </select><br><br>

        <input type="text" name="name" value="{{ $booking->name }}"><br>

        <input type="number" name="volume" value="{{ $booking->volume }}"><br>

        <input type="number" name="weight" value="{{ $booking->weight }}"><br>

        <input type="date" name="date" value="{{ $booking->date }}"><br>

        <input type="time" name="time" value="{{ $booking->time }}"><br><br>

        <button type="submit">Update</button>
    </form>

</body>
</html>