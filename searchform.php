<?php
$unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<form role="search" method="get" class="search-form" action="<?php print esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="search" class="form-control" placeholder="<?php print esc_html__( 'Search &hellip;', 'sierra' ); ?>" value="<?php print get_search_query(); ?>" name="s" aria-label="Search" />
        <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>