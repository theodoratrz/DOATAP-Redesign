<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">

        <?php

        require_once($_SERVER['DOCUMENT_ROOT'] . '/../config/pages.php');

        # Get path array
        $path = $_SERVER['REQUEST_URI'];
        $path_array = explode("/", $path);        
        
        foreach ($path_array as $key => $value) {
            
            $cur_path = substr($path, 0, strpos($path, $value)+strlen($value)+1);
            
            if (str_ends_with($value, ".php"))
                echo '<li class="breadcrumb-item active" aria-current="page">'. $page_names[$value] .'</li>';
            else
                echo '<li class="breadcrumb-item"><a href="'. $cur_path .'">' . $page_names[$value] . '</a></li>';
        }
        ?>

    </ol>
</nav>