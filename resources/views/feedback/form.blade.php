<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{ route('feedback.submit') }}">
        @csrf
        <input type="hidden" name="cours_id" value="{{ $cours_id }}">

        <label for="note">Votre note:</label>
        <select name="note" id="note" required>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        
        
        <label for="message">Votre avis :</label>
        <textarea name="message" id="message" rows="4" required></textarea>
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>