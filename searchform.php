
<form role="search" method="get" class="input-group" action="<?php print esc_url( home_url( '/' ) ); ?>">

        <input type="text" name="s" class="form-control" value="<?php print get_search_query(); ?>" placeholder="<?php echo esc_html__('Search', 'sierra') ?>" aria-label="<?php echo esc_html__('Search', 'sierra') ?>">
        <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
        </span>

</form>


