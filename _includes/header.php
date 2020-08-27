<!-- HEADER -->
<?php 
if (stream_resolve_include_path('menu-bbma.php')) include 'menu-bbma.php'; ?> 
<header id="navbar" role="banner" class="header-no-responsive navbar">
    <?php if (stream_resolve_include_path('top-bar.php')) include 'top-bar.php'; ?>
    <!-- bloc logo, slogan -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="navbar-header">
                    <!-- logo -->
                    <h1>
                        <a class="logo navbar-btn" href="/{{page.lang}}" title="Accueil">
                            <img src="/images/biblissima-logo-outils.svg" alt="Outils Biblissima">
                        </a>
                    </h1>
                    <button type="button" class="navbar-toggle collapsed header__icon" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- slogan -->
                    <p class="lead">{{ site.data.site_info[page.lang].description }}</p>
                </div>
            </div>
            <!-- #bloc logo, slogan -->
            <!-- bloc outils -->
            <div class="col-sm-8 tool-box">
                <!-- bloc outils - top -->
                <div class="tools-top clearfix" role="complementary">
                    <div class="region-tools-top">
                        <!-- bloc de resaux sociaux -->
                        <div class="bloc-social-links tool-box-bloc clearfix">
                            <ul class="nav">
                                <li><a href="https://facebook.com/biblissima" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/biblissima" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="http://www.slideshare.net/biblissima" title="Slideshare"><i class="fa fa-slideshare"></i></a></li>
                                <li><a href="https://github.com/biblissima" title="Github"><i class="fa fa-github"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCaHWzwUV0xBAQ-sEdE9EtKg" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tools-bottom clearfix">
                    <div class="region region-tools-bottom">
                        <div id="block-locale-language" class="block block-locale langue-box contextual-links-region clearfix">
                            <ul class="language-switcher-locale-url">
                            <!-- slug_en / slug_fr is used and should be defined in the template when page slugs are different in each language -->
                            {% if page.lang == 'fr' %}
                                {% if page.slug_en %}
                                    {% assign link = page.slug_en | prepend: '/en' | split: '/fr' %}
                                {% else %}
                                    {% assign link = page.url | prepend: '/en' | split: '/fr' %}
                                {% endif %}
                                <li class="fr first active"><a href="{{page.url}}" class="language-link active" lang="fr">fr</a></li>
                                <li class="en last"><a href="{{link}}" class="language-link" lang="en">en</a></li>
                            {% else %}
                                {% if page.slug_fr %}
                                    {% assign link = page.slug_fr | prepend: '/fr' | split: '/en' %}
                                {% else %}
                                    {% assign link = page.url | prepend: '/fr' | split: '/en' %}
                                {% endif %}
                                <li class="fr first"><a href="{{link}}" class="language-link" lang="fr">fr</a></li>
                                <li class="en last active"><a href="{{page.url}}" class="language-link active" lang="en">en</a></li>
                            {% endif %}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {% include menu.html %}
</header>
