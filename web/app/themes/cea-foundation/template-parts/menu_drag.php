<nav  id="menu_drag" class="bg-blue ui-widget-content">

    <i class="la la-lg la-bars"></i> 
    <h3 class="text-center"><img class="menu-logo" alt="CEA" src="<?= get_template_directory_uri(); ?>/dist/assets/images/cea-logo-blanc.svg"></h3>

    <ul class="vertical menu text-center" data-drilldown  data-animate-height="true" style="max-width: 250px;">

        <li>
            <a href="#e">D&eacute;couvrir</a>
            <ul class="vertical menu">
                <li><a href="<?= get_home_url(); ?>/decouvrir/actualites/">actualit&eacute;s</a></li>
                <li><a href="<?= get_home_url(); ?>/decouvrir/archives/">archives</a></li>
            </ul>
        </li>
        <li><a href="<?= get_home_url(); ?>/echanger/">&eacute;changer</a></li>
        <li><a href="<?= get_home_url(); ?>/curater/">curater</a></li>
        <li>
            <a href="#e">S'informer</a>
            <ul class="vertical menu">
                <li><a href="<?= get_home_url(); ?>/sinformer/annuaire/">annuaire</a></li>
                <li><a href="<?= get_home_url(); ?>/sinformer/ressources/">ressources</a></li>
            </ul>
        </li>
        <li><a href="<?= get_home_url(); ?>/structurer/">structurer</a></li>
        <li><br/><a href="<?= get_home_url(); ?>/" class="inline_">FR</a>/<a class="inline_" href="<?= get_home_url(); ?>/en">EN</a></li>
    </ul>
</nav>