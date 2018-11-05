<?php

$content = '<div class="container">';
$content .= '<div class="row">';

foreach ($feeds as $key => $feed) {
    $img = $feed['img'];
    $name = $feed['name'];
    $url = $feed['url'];
    $heartbeat = $feed['heartbeat'];

    
    if ($heartbeat === null) {
        continue;
    }
    
    // No image handler
    if ($img === null || !file_exists(__DIR__.'/../public/'.$img)) {
        $img = '/img/no_image.png';
    }
    
    // Truncate text
    if (strlen($desc) > 200) {
        $desc = substr($desc, 0, 197) . '...';
    }
    
    
    $content .= <<<EOT
    <div class="col-md-6 col-lg-3 my-3">
        <div class="card">
          <img class="card-img-top bg-secondary" src="$img" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">
                $title
            </h5>
            <p class="card-text"> $url</p>
            <p class="card-text"><small class="text">$heartbeat</small></p>
            <p class="card-text"><span class="badge badge-info"></span></p>
          </div>
        </div>
    </div>
EOT;
}

$content .= '</div>';
$content .= '</div>';
$title = 'Feed Reader';

include __DIR__ . '/Base.html.php';
