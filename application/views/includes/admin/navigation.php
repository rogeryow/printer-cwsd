<?php
    $admin = [
        [
            "class"         => "dash",
            "url"           => base_url('clients'),
            "icon_class"    => "fa fa-users",
            "title"         => "CLIENTS",
            "sub_menu"      => null,

        ],
        [
            "class"         => "dash",
            "url"           => base_url('called_client'),
            "icon_class"    => "fa fa-phone",
            "title"         => "CALLED CLIENTS",
            "sub_menu"      => null,

        ],
        [
            "class"         => "dash",
            "url"           => base_url('admin/profile'),
            "icon_class"    => "fa fa-user",
            "title"         => "USERS",
            "sub_menu"      => null,

        ],
    ];

    function childMenu($data)
    {
        echo '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
        foreach($data as $k=>$d)
        {
            echo '<li class="nav-item '.$d['class'].'">

            <a href="'.$d['url'].'>" class="nav-link">
            <i class="'.$d['icon_class'].'"></i>
            <p>
                '.$d['title'].'
            </p>
            </a>

        </li>';
        }
        echo "</ul>";
    }

    $usrtyp=$userTyp;
    $menu=$$usrtyp;

    // echo '<pre>';
    //     print_r($menu);
    // echo '</pre>';
    
    if($menu!=null)
    {
        echo '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
        foreach ($menu as $m)
        {
            echo '<li class="nav-item '.$m['class'].'" style="border-bottom: 1px solid #a9a9a9; border-top: 1px solid #a9a9a9;">

            <a href="'.$m['url'].'" class="nav-link">
            <i class="'.$m['icon_class'].'"></i>
            <p>
                '.$m['title'].'
            </p>
            </a>

        </li>';
            if ($m['sub_menu'] != null)
            {
                echo "<i class='fa fa-angle-left pull-right'></i>";
            }
            echo "</a>";
            if ($m['sub_menu'] != null)
            {
                childMenu($m['sub_menu']);
            }
            echo "</li>";
        }
        echo "</ul>";
    }

?>
