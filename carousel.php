<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex position-relative overflow-hidden justify-content-center align-items-center" style="min-height: 50vh;">
        
        <?php
        $url = 'https://reqres.in/api/users?page=2';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        $users = $data['data'];
        ?> 
          <?php foreach ($users as $user): ?>
                <div class="bg-light rounded px-4 py-3 overflow-hidden text-center d-flex flex-column justify-content-center align-items-center">
                    <div class="" style="">
                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <i class="fa-solid fa-3x text-primary fa-quote-left"></i>
                            <em><i>Efficient, thorough, and highly professional service. They eliminated the pests and left my home sparkling clean. Highly recommended!</i>
                        </div></em>
                        <div class="py-1 pt-3 px-2 gap-2  d-flex" aria-label="<?= htmlspecialchars($s['first_name']) ?>">
                            <div class="rounded-circle overflow-hidden" style="height: 44px; width: 44px">
                                <img src="<?= htmlspecialchars($user['avatar']) ?>" sizes="(max-width: 768px) 92vw, (max-width: 1200px) 80vw, 60vw"
                                    width="50" height="50" alt="avatar" width="50" />
                            </div>
                            <div class="">
                                <div class="d-flex text-primary">
                                    <?= htmlspecialchars($user['first_name']) ?>
                                    <?= htmlspecialchars($user['last_name']) ?>
                                </div>
                                <div>
                                    <?= htmlspecialchars($user['email']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    </div>
    <!-- jQuery (required) and OwlCarousel2 JS (CDN) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('.owl-carousel').owlCarousel({
                items: 1, // 1 slide at a time (hero)
                loop: true,
                margin: 16,
                autoplay: true,
                autoplayTimeout: 3500, // 3.5s per slide
                autoplayHoverPause: true,
                autoplaySpeed: 600, // slide animation speed
                smartSpeed: 650, // nav/dots speed
                dots: true,
                nav: true,
                navText: ['‹', '›'], // simple arrows; replace with icons if you like
                responsive: {
                    768: {
                        items: 1
                    },
                    1024: {
                        items: 4
                    }
                }
            });

            // Optional: start/stop from JS if needed
            // const $owl = $('.owl-carousel');
            // $owl.trigger('play.owl.autoplay', [3500]);   // start
            // $owl.trigger('stop.owl.autoplay');           // stop
        });
    </script>
</body>

</html>