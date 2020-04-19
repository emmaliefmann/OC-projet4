

<?php

require('model/frontend.php');

$response = getPosts();

require('view/frontend/listview.php');