<div id="header">
    <div class="bg-header">
        <div class="container">
            <?php include_partial('commom/logoArea') ?>
        </div>
    </div>
    <div class="bg-title <?php print (has_slot('encurtador-form'))?'no-border':''; ?>">
        <div class="container">
            <div class="row title-page">
                <div class="span5">
                    <h1><?php print $sf_user->getFlash('title-page', 'Default') ?></h1>
                </div>
                <div class="span7">
                    <?php
                    if ($sf_user->isAuthenticated()) {
                        if ($sf_user->getAttribute('profile_preference') == 'publisher') {
                            include_partial('commom/publisher');
                        } else if ($sf_user->getAttribute('profile_preference') == 'advertiser') {
                            include_partial('commom/advertiser');
                        } else {
                            include_partial('commom/publisher');
                            $sf_user->setAttribute('profile_preference', 'publisher');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>