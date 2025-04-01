<!-- HEADER -->
<?php 
if (stream_resolve_include_path('menu-bbma.php')) include 'menu-bbma.php'; ?> 
<header id="header" class="header" role="banner" aria-label="Site header">
    <?php if (stream_resolve_include_path('top-bar.php')) include 'top-bar.php'; ?>
    {% include menu.html %}
</header>
