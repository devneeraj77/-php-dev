<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Cards</title>
  <!-- Add Bootstrap CDN or custom CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
        $cards = [
          [
            'title' => 'Card One',
            'description' => 'This is the description for card one.',
            'image' => 'https://via.placeholder.com/300x200'
          ],
          [
            'title' => 'Card Two',
            'description' => 'This is the description for card two.',
            'image' => 'https://via.placeholder.com/300x200'
          ],
          [
            'title' => 'Card Three',
            'description' => 'This is the description for card three.',
            'image' => 'https://via.placeholder.com/300x200'
          ]
        ];

        foreach ($cards as $card) {
          echo '
          <div class="col">
            <div class="card h-100">
              <img src="' . $card['image'] . '" class="card-img-top" alt="' . $card['title'] . '">
              <div class="card-body">
                <h5 class="card-title">' . $card['title'] . '</h5>
                <p class="card-text">' . $card['description'] . '</p>
              </div>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>
</body>
</html>
