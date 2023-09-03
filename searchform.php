<form role="search" method="get" class="search-form" id="searchform" action="<?= home_url('/') ?>">
    <div class="input-group">
        <input class="form-control" type="search" placeholder="Поиск видео..." value="<?php echo get_search_query() ?>" aria-label="Search" name="s" id="s">
        <button class="btn btn-outline-danger" type="submit" title="Search">
            <span class="fa fa-search"></span>
        </button>
    </div>
</form>