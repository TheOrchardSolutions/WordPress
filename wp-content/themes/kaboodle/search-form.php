<div class="search_main">
    <form method="get" class="searchform" action="<?php bloginfo( 'url' ); ?>" >
        <input type="text" class="field s" name="s" value="<?php esc_attr_e( 'Search...', 'woothemes' ) ?>" onfocus="if (this.value == '<?php esc_attr_e( 'Search...', 'woothemes' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php esc_attr_e( 'Search...', 'woothemes' ) ?>';}" />
        <input type="image" src="<?php bloginfo( 'template_url' ); ?>/images/ico-search.png" class="search-submit" name="submit" value="<?php esc_attr_e( 'Go', 'woothemes' ); ?>" />
    </form>    
    <div class="fix"></div>
</div>
