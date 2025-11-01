<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>All Book QR Codes</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .qr-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .qr-item {
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 30%;
            margin: 10px;
        }

        img {
            width: 120px;
            height: 120px;
        }

        p {
            margin: 5px 0;
            font-size: 14px;
        }

        .book-title {
            font-weight: bold;
        }

        .book-code {
            color: #555;
        }
    </style>
</head>
<body>
  <h2>📚 Books QR Code List</h2>
  <p style="text-align:center; margin-bottom:20px;">
    Each QR Code below represents a unique identifier for each book in the library system.
  </p>

  <div class="qr-container">
    @foreach($qrData as $data)
      <div class="qr-item">
        <img src="data:image/png;base64,{{ $data['qr_base64'] }}" alt="QR Code">
        <div class="book-title">{{ $data['title'] }}</div>
        <div class="book-code">{{ $data['code'] }}</div>
      </div>
    @endforeach
  </div>
</body>
</html>
