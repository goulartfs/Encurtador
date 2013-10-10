<?php
if ($sf_user->getAttribute() == 'publisher') {
    include_partial('commom/publisher');
} else if ($sf_user->getAttribute() == 'advertiser') {
    include_partial('commom/advertiser');
} else {
    include_partial('commom/publisher');
    $sf_user->setAttribute('profile', 'publisher');
}