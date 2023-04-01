@php
    function renderCategoryNavbar($categoryTrees)
    {
        $categoryNavbar = '<ul class="nav navbar-nav">';
        foreach ($categoryTrees as $categoryTree) {
            $categoryNavbar .= renderCategoryTree($categoryTree);
        }

        $categoryNavbar .= '</ul>';
        return $categoryNavbar;
    }

    function renderCategoryTree($categoryTree)
    {
        $liElement = '<li>';

        $linkElement = '<a href="#">' . $categoryTree['name'];
        if (count($categoryTree['children']) === 0) {
            $linkElement .= '</a>';
            $liElement .= $linkElement . '</li>';
            return $liElement;
        }
        $linkElement .= ' <span class="caret"></span></a>';

        $dropdownMenu = '<ul class="dropdown-menu">';
        foreach ($categoryTree['children'] as $categoryChild) {
            $dropdownMenu .= renderCategoryTree($categoryChild);
        }
        $dropdownMenu .= '</ul>';

        $liElement .= $liElement . $linkElement . $dropdownMenu . '</li>';
        return $liElement;
    }
@endphp

<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    {!! renderCategoryNavbar($data['categoryTrees']) !!}
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
</section>